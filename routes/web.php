<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/api/v1/is_logged_in', "Controller@api_is_logged_in");
Route::post('/api/v1/login', "Controller@api_login");
Route::post('/api/v1/register', "Controller@api_register");
Route::post('/api/v1/logout', "Controller@api_logout");
Route::post('/api/v1/get_product', "Controller@api_get_product");
Route::post('/api/v1/list_product', "Controller@api_list_products");
Route::post('/api/v1/get_products_from_ids_and_quantity_array', "Controller@api_get_products_from_ids_and_quantity_array");
Route::post('/api/v1/create_orders', "Controller@api_create_order");
Route::post('/api/v1/order/history', "Controller@api_get_order_history");
