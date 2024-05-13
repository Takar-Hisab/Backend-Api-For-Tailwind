<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');

            $table->foreignId('category_id')
            ->constrained('categories')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('brand_id')
            ->constrained('brands')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('store_id')
            ->constrained('stores')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->string('sku')->unique()->index();
            $table->string('price');
            $table->string('quantity')->nullable();
            $table->string('slug')->unique();
            $table->string('title')->nullable()->index();
            $table->longText('description')->nullable();
            $table->string('bar_code')->nullable()->index();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
