<?php

use App\Http\Controllers\Api\Customer\AuthController;
use App\Http\Controllers\Api\Customer\ProductController;
use App\Http\Controllers\Api\Customer\CategoryController;
use App\Http\Controllers\Api\Customer\BrandController;
use App\Http\Controllers\Api\Customer\ServiceController;
use App\Http\Controllers\Api\Customer\PackageController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Vendor\AuthenticationController;
use App\Http\Controllers\Api\Vendor\DashboardController;
use App\Http\Controllers\Api\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(callback: function (){
    Route::get('/user', [UserController::class, 'getUser']);

    Route::prefix('admin')->group(function (){
        Route::apiResource('vendor', VendorController::class);
        Route::get('vendors/{vendor_id}/customers', [VendorController::class, 'getVentorCustomers']);
        Route::apiResource('customer', CustomerController::class);
        Route::apiResource('plans', PlanController::class);
    });

    Route::prefix('vendor')->group(function (){
        Route::withoutMiddleware('auth:sanctum')->group(function (){
            Route::post('/login', [AuthenticationController::class, 'login']);
            Route::post('/register', [AuthenticationController::class, 'register']);
        });
        Route::get('/my-customers', [DashboardController::class, 'myCustomes']);
    });

    Route::prefix('customer')->group(function (){
        Route::withoutMiddleware('auth:sanctum')->group(function (){
            Route::post('/login', [AuthController::class, 'login']);
            Route::post('/register', [AuthController::class, 'register']);
        });
        Route::apiResources([
            'products'   =>     ProductController::class,
            'categories' =>     CategoryController::class,
            'brands'     =>     BrandController::class,
            'services'   =>     ServiceController::class,
            'packages'   =>     PackageController::class,
        ]);
    });
});