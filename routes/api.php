<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('isAdmin')->group(function(){
    Route::apiResource('customers', \App\Http\Controllers\Api\CustomerController::class)->except(['create', 'store']);
});

Route::post('customers', [\App\Http\Controllers\Api\CustomerController::class, 'store'])->name('customers.store');
//Route::get('customers/')
