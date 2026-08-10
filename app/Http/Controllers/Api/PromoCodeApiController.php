<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PromoCodeApiController extends Controller
{
    /**
     * Preview a promo code against a cart subtotal. Does NOT increment usage —
     * that happens only when the order is actually created.
     */
    public function validate(Request $request): JsonResponse
    {
        $data = $request->validate([
            'code' => 'required|string|max:64',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $subtotal = (float) $data['subtotal'];
        $promo = PromoCode::resolve($data['code']);

        if (! $promo) {
            return response()->json(['valid' => false, 'message' => 'Промокод недійсний']);
        }

        if ($error = $promo->validationError($subtotal)) {
            return response()->json(['valid' => false, 'message' => $error]);
        }

        return response()->json([
            'valid' => true,
            'code' => $promo->code,
            'type' => $promo->type,
            'value' => (float) $promo->value,
            // Потрібне вітрині, щоб перерахувати знижку при зміні кошика
            // й підказати, скільки не вистачає до мінімальної суми.
            'min_order_total' => $promo->min_order_total ? (float) $promo->min_order_total : null,
            'discount' => $promo->discountFor($subtotal),
            'message' => 'Промокод застосовано',
        ]);
    }
}
