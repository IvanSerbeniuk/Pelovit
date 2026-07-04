<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubscribeController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'name'  => 'nullable|string|max:255',
        ]);

        $subscriber = Subscriber::where('email', $validated['email'])->first();

        if ($subscriber) {
            if (! $subscriber->is_active) {
                $subscriber->update(['is_active' => true, 'name' => $validated['name'] ?? $subscriber->name]);
            }
            return response()->json(['success' => true]);
        }

        Subscriber::create([
            'email'     => $validated['email'],
            'name'      => $validated['name'] ?? null,
            'is_active' => true,
        ]);

        return response()->json(['success' => true], 201);
    }
}
