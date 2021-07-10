<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SalesUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [App\Http\Controllers\API\SalesUserController::class, 'index']);
Route::apiResource('sales_user', SalesUserController::class);
Route::get('/add', [App\Http\Controllers\API\SalesUserController::class, 'add']);
Route::get('/edit/{id}', [App\Http\Controllers\API\SalesUserController::class, 'edit']);
Route::put('/edit/{id}', [App\Http\Controllers\API\SalesUserController::class, 'update']);
