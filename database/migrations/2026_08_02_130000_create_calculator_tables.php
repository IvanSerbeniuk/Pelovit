<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Прайс калькулятора контрактного виробництва. Сенс поля `value`
        // залежить від групи, тому воно одне на всі опції:
        //   product   — собівартість 1 мл, ₴
        //   formula   — множник до собівартості рецептури
        //   packaging — ціна тари за штуку, ₴
        //   label     — ціна етикетки за штуку, ₴
        //   box       — ціна коробки за штуку, ₴
        Schema::create('calculator_options', function (Blueprint $table) {
            $table->id();
            $table->string('group', 20);
            $table->string('name');
            $table->decimal('value', 10, 4)->default(0);
            $table->string('image')->nullable();
            $table->string('hint')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['group', 'sort_order']);
        });

        // Знижка за тираж: застосовується найвища ступінь, поріг якої пройдено.
        Schema::create('calculator_tiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('min_quantity');
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->timestamps();

            $table->index('min_quantity');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculator_tiers');
        Schema::dropIfExists('calculator_options');
    }
};
