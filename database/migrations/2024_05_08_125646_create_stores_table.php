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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('name');
            $table->string('email')->nullable();
            $table->string('store_theme')->nullable();
            $table->string('theme_dir')->nullable();
            $table->string('domains')->nullable();
            $table->string('enable_domain')->default('off');
            $table->longText('about')->nullable();
            $table->string('tagline')->nullable();
            $table->string('slug')->nullable();
            $table->string('lang', 5)->default('en');

            $table->text('store_js')->nullable();
            $table->string('currency')->default('$');
            $table->string('currency_code')->default('USD');

            $table->string('currency_symbol_position')->default('pre')->nullable();
            $table->string('currency_symbol_space')->default('without')->nullable();

            $table->string('google_analytic')->nullable();
            $table->string('fb_pixel_code')->nullable();

            $table->string('meta_image')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_desc')->nullable();


            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();

            $table->string('logo')->nullable();
            $table->string('invoice_logo')->nullable();
            $table->string('favicon')->nullable();


            $table->text('mail_driver')->nullable();
            $table->text('mail_host')->nullable();
            $table->text('mail_port')->nullable();
            $table->text('mail_username')->nullable();
            $table->text('mail_password')->nullable();
            $table->text('mail_encryption')->nullable();
            $table->text('mail_from_address')->nullable();
            $table->text('mail_from_name')->nullable();


            $table->integer('is_store_enabled')->default(1);
            $table->string('is_checkout_login_required')->default('on');
            $table->integer('is_active')->default(1);
            $table->integer('created_by')->default(0);

            $table->string('enable_whatsapp')->default('off');
            $table->string('whatsapp_number')->nullable();

            $table->string('enable_cod')->default('off');
            $table->string('enable_bank')->default('off');
            $table->string('bank_number')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
