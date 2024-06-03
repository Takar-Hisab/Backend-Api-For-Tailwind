<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Vendor\AuthenticationController;
use App\Http\Controllers\Api\Vendor\DashboardController;
use App\Http\Controllers\Api\VendorController;
use App\Http\Controllers\Api\Vendor\CustomerController as VendorCustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(callback: function (){

    Route::prefix('admin')->group(function (){
        Route::apiResource('vendor', VendorController::class);
        Route::get('vendors/{vendor_id}/customers', [VendorController::class, 'getVentorCustomers']);
        Route::apiResource('customer', CustomerController::class);
        Route::apiResource('plan', PlanController::class);

    });

    Route::prefix('vendor')->group(function (){
        Route::withoutMiddleware('auth:sanctum')->group(function (){
            Route::post('/register', [AuthenticationController::class, 'register']);
        });
        Route::apiResource('plans', PlanController::class);

        Route::get('/my-customers', [VendorCustomerController::class, 'myCustomes']);
        Route::get('/single-customer/{customer_id}', [VendorCustomerController::class, 'singleCustomer']);
        Route::post('/create-customer', [VendorCustomerController::class, 'createCustomer']);
    });

    Route::prefix("v1")->group(function(){
        Route::post('/login', [AuthenticationController::class, 'login'])->withoutMiddleware("auth:sanctum");

        Route::get('/user', [UserController::class, 'getUser']);

        Route::apiResource('plans', PlanController::class);

        Route::post('/logout', [AuthenticationController::class, 'logout']);
    });


});
