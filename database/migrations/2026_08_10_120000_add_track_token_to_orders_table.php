<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('track_token', 64)->nullable()->unique()->after('payment_id');
        });

        // Замовлення, створені до появи токена, теж мають бути відстежувані —
        // інакше посилання зі старих листів нікуди не веде.
        DB::table('orders')->whereNull('track_token')->orderBy('id')
            ->each(fn ($order) => DB::table('orders')
                ->where('id', $order->id)
                ->update(['track_token' => Str::random(48)]));
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('track_token');
        });
    }
};
