<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CanteenController;
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

Auth::routes();
Route::get('/home', [HomeController::class, 'index']);

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{item:id}', [ItemController::class, 'show']);
Route::post('/items/{item:id}', [ItemController::class, 'buy'])->middleware('auth');

Route::get('/my-items', [ItemController::class, 'showMyItem'])->middleware('auth');
Route::get('/my-items/create', [ItemController::class, 'showCreate'])->middleware('auth');
Route::post('/my-items/create', [ItemController::class, 'storeItem'])->middleware('auth');

Route::post('/addBalance', [CanteenController::class, 'addBalance'])->middleware('auth');
Route::post('/wthBalance', [CanteenController::class, 'withdraw'])->middleware('auth');

Route::fallback(function () {
    return redirect('/home');
});
