<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Mail\OrderNotification;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderApiController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'email'          => 'nullable|email|max:255',
            'city'           => 'required|string|max:255',
            'branch'         => 'required|string|max:255',
            'payment_method' => 'required|in:card,cod',
            'comment'        => 'nullable|string',
            'items'          => 'required|array|min:1',
            'items.*.id'     => 'required|integer',
            'items.*.name'   => 'required|string',
            'items.*.price'  => 'required|numeric',
            'items.*.qty'    => 'required|integer|min:1',
            'total'          => 'required|numeric|min:0',
        ]);

        $order = Order::create($validated);

        try {
            if ($order->email) {
                Mail::to($order->email)->send(new OrderConfirmation($order));
            }
            if ($adminEmail = config('mail.admin_email')) {
                Mail::to($adminEmail)->send(new OrderNotification($order));
            }
        } catch (\Exception $e) {
            Log::error('Mail send failed: ' . $e->getMessage());
        }

        return response()->json(['success' => true, 'order_id' => $order->id], 201);
    }
}
