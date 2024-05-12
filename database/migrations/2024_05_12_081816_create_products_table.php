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
            $table->foreignId('user_id')->constrained();

            $table->foreignId('category_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreignId('brand_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->string('sku')->unique()->index();
            $table->string('price');
            $table->string('quantity')->nullable();
            $table->string('slug')->unique();
            $table->string('title')->nullable()->index();
            $table->longText('description')->nullable();
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
