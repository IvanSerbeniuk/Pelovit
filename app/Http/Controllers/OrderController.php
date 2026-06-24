<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Mail\OrderNotification;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'email'          => 'nullable|email|max:255',
            'city'           => 'nullable|string|max:255',
            'branch'         => 'nullable|string|max:255',
            'payment_method' => 'required|in:card,cod',
            'comment'        => 'nullable|string',
            'items'          => 'required|json',
            'total'          => 'required|numeric|min:0',
        ]);

        $validated['items'] = json_decode($validated['items'], true);

        if (empty($validated['items'])) {
            return back()->withErrors(['items' => 'Кошик порожній.']);
        }

        $order = Order::create($validated);

        // Клієнту — якщо вказав email
        if ($order->email) {
            Mail::to($order->email)->send(new OrderConfirmation($order));
        }

        // Адміну
        if ($adminEmail = config('mail.admin_email')) {
            Mail::to($adminEmail)->send(new OrderNotification($order));
        }

        return redirect()->route('order.success');
    }
}
