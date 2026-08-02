<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NovaPoshtaApiController extends Controller
{
    private const API_URL = 'https://api.novaposhta.ua/v2.0/json/';

    public function cities(Request $request): JsonResponse
    {
        $query = trim((string) $request->query('q', ''));

        if (mb_strlen($query) < 2) {
            return response()->json([]);
        }

        return response()->json($this->cached('np_cities_'.mb_strtolower($query), now()->addDay(), function () use ($query) {
            $items = $this->call('Address', 'getCities', [
                'FindByString' => $query,
                'Limit' => 20,
            ]);

            return collect($items)
                ->map(fn (array $city) => [
                    'ref' => $city['Ref'] ?? null,
                    'name' => $city['Description'] ?? '',
                    'area' => $city['AreaDescription'] ?? '',
                ])
                ->filter(fn (array $city) => $city['ref'] && $city['name'])
                ->values()
                ->all();
        }));
    }

    public function warehouses(Request $request): JsonResponse
    {
        $cityRef = (string) $request->query('city_ref', '');

        if ($cityRef === '') {
            return response()->json([]);
        }

        $warehouses = $this->cached('np_warehouses_'.$cityRef, now()->addHours(6), function () use ($cityRef) {
            $items = $this->call('Address', 'getWarehouses', [
                'CityRef' => $cityRef,
                'Limit' => 500,
            ]);

            return collect($items)
                ->map(fn (array $w) => [
                    'ref' => $w['Ref'] ?? null,
                    'description' => $w['Description'] ?? '',
                    'number' => $w['Number'] ?? null,
                ])
                ->filter(fn (array $w) => $w['ref'] && $w['description'])
                ->sortBy(fn (array $w) => (int) $w['number'])
                ->values()
                ->all();
        });

        return response()->json($warehouses);
    }

    /**
     * Кешує лише непорожню відповідь. Через Cache::remember збій API або
     * відсутній ключ осідали в кеші на добу, і підказки не з'являлися ще довго
     * після того, як проблему вже полагодили.
     */
    private function cached(string $key, \DateTimeInterface $ttl, \Closure $callback): array
    {
        $cached = Cache::get($key);

        if (is_array($cached)) {
            return $cached;
        }

        $fresh = $callback();

        if ($fresh !== []) {
            Cache::put($key, $fresh, $ttl);
        }

        return $fresh;
    }

    private function call(string $model, string $method, array $properties): array
    {
        $apiKey = config('services.nova_poshta.key');

        if (! $apiKey) {
            return [];
        }

        try {
            $response = Http::timeout(5)->post(self::API_URL, [
                'apiKey' => $apiKey,
                'modelName' => $model,
                'calledMethod' => $method,
                'methodProperties' => $properties,
            ]);

            if (! $response->successful()) {
                return [];
            }

            $json = $response->json();

            return $json['success'] ?? false ? ($json['data'] ?? []) : [];
        } catch (\Throwable $e) {
            Log::warning('Nova Poshta API request failed: '.$e->getMessage());

            return [];
        }
    }
}
