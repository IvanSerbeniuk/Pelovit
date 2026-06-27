<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;

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

require __DIR__.'/auth.php';
