<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Конфігурація з калькулятора контрактного виробництва: менеджеру
     * потрібно бачити, що саме рахував клієнт, а не лише його контакти.
     */
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->text('details')->nullable()->after('company');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('details');
        });
    }
};
