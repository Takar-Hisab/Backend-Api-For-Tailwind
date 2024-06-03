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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('vendor_id')
                ->nullable()
                ->index()
                ->constrained('vendors')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

//            $table->foreignId('plan_id')->nullable();//->index()->constrained('plans');
            $table->date('register_date');
            $table->string('referal_code');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('plan_id')->default(1)->constrained('plans');
            $table->date('plan_reg_date')->nullable();
            $table->date('plan_exp_date')->nullable();
            $table->double('use_storage_limit', 8, 2)->nullable();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
