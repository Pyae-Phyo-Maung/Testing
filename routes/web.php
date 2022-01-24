<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('index');
});
Route::resource('brokers',BrokerController::class);
Route::resource('items',ItemController::class);
Route::resource('invoices',InvoiceController::class);
Route::resource('orders',OrderController::class);
