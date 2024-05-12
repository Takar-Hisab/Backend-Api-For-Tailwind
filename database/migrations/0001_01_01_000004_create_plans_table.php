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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->float('price')->default(0);
            $table->string('duration', 100)->nullable();
            $table->integer('max_products')->default(0);
            $table->integer('max_users');
            $table->integer('max_invoice');
            $table->float('storage_limit');
            $table->boolean('enable_custdomain')->default(0);
            $table->string('additional_page')->nullable();
            $table->boolean('blog')->default(0);
            $table->boolean('enable_custsubdomain')->default(0);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
