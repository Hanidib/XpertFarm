<?php

use App\Http\Controllers\API\InvetoryLocationController;
use App\Http\Controllers\API\StockController;
use App\Http\Controllers\API\SupplierController;
use App\Http\Controllers\API\UserController;
use App\Models\InvetoryLocation;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('stocks', StockController::class);
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('suppliers', SupplierController::class);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('InvetoryLocation', InvetoryLocationController::class);
});
