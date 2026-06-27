<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Subscriber;

Route::get('/admin/orders/export-csv', function () {
    $orders = Order::orderBy('created_at', 'desc')->get();

    $bom = "\xEF\xBB\xBF";
    $csv = $bom . implode(';', ['ID', 'Імʼя', 'Прізвище', 'Телефон', 'Email', 'Місто', 'Відділення', 'Оплата', 'Статус', 'Сума', 'Дата']) . "\n";

    foreach ($orders as $order) {
        $csv .= implode(';', [
            $order->id,
            '"' . str_replace('"', '""', $order->first_name ?? '') . '"',
            '"' . str_replace('"', '""', $order->last_name ?? '') . '"',
            '"' . $order->phone . '"',
            '"' . $order->email . '"',
            '"' . str_replace('"', '""', $order->city ?? '') . '"',
            '"' . str_replace('"', '""', $order->branch ?? '') . '"',
            '"' . $order->payment_method . '"',
            '"' . $order->status . '"',
            $order->total,
            $order->created_at->format('d.m.Y H:i'),
        ]) . "\n";
    }

    return response($csv)
        ->header('Content-Type', 'text/csv; charset=UTF-8')
        ->header('Content-Disposition', 'attachment; filename="orders-' . now()->format('Y-m-d') . '.csv"');
})->middleware(['moonshine', 'MoonShine\Laravel\Http\Middleware\Authenticate'])->name('admin.orders.export');

Route::post('/admin/settings/save', function (\Illuminate\Http\Request $request) {
    $keys = ['phone', 'phone_2', 'phone_3', 'email', 'instagram_url', 'facebook_url', 'telegram_url', 'viber_url', 'youtube_url', 'banner_text', 'min_free_shipping'];
    foreach ($keys as $key) {
        if ($request->has($key)) {
            Setting::set($key, $request->input($key, ''));
        }
    }
    return redirect()->back()->with('success', 'Налаштування збережено');
})->middleware(['moonshine', 'MoonShine\Laravel\Http\Middleware\Authenticate'])->name('admin.settings.save');

Route::get('/admin/subscribers/export-csv', function () {
    $bom = "\xEF\xBB\xBF";
    $csv = $bom . implode(';', ['ID', 'Email', 'Імʼя', 'Активний', 'Дата']) . "\n";
    Subscriber::orderBy('created_at', 'desc')->get()->each(function ($s) use (&$csv) {
        $csv .= implode(';', [$s->id, $s->email, '"' . ($s->name ?? '') . '"', $s->is_active ? 'Так' : 'Ні', $s->created_at->format('d.m.Y')]) . "\n";
    });
    return response($csv)
        ->header('Content-Type', 'text/csv; charset=UTF-8')
        ->header('Content-Disposition', 'attachment; filename="subscribers-' . now()->format('Y-m-d') . '.csv"');
})->middleware(['moonshine', 'MoonShine\Laravel\Http\Middleware\Authenticate'])->name('admin.subscribers.export');

require __DIR__.'/auth.php';
