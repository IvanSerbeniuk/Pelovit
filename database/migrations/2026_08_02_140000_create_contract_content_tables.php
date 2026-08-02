<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Відгуки про співпрацю: були захардкожені в сторінці, через що
        // додати новий міг лише розробник.
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('quote');
            $table->text('text');
            $table->string('author_name');
            $table->string('author_role')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });

        // Кейси: готові бренди клієнтів. Головний доказ на сторінці
        // контрактного виробництва — сторінка досі показувала лише обіцянки.
        Schema::create('brand_cases', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('client_name')->nullable();
            $table->string('client_role')->nullable();
            $table->text('description')->nullable();
            $table->string('result')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });

        // FAQ прив'язаний до сторінки, щоб той самий механізм працював
        // і для інших розділів сайту.
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('page', 30)->default('contract');
            $table->string('question');
            $table->text('answer');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['page', 'is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('brand_cases');
        Schema::dropIfExists('testimonials');
    }
};
