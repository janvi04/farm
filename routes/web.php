<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[ClientController::class,'home']);

Route::get('/cart',[ClientController::class,'cart']);

Route::get('/shop',[ClientController::class,'shop']);


Route::get('/checkout',[ClientController::class,'checkout']);

Route::get('/login',[ClientController::class,'login']);

Route::get('/signup',[ClientController::class,'signup']);


Route::get('/admin',[AdminController::class,'dashboard']);


Route::get('/addcategory',[CategoryController::class,'addcategory']);
Route::get('/categories',[CategoryController::class,'categories']);
Route::post('/savecategory',[CategoryController::class,'savecategory']);
Route::get('/edit_category/{id}',[CategoryController::class,'edit']);
Route::post('/updatecategory',[CategoryController::class,'updatecategory']);
Route::get('/delete/{id}',[CategoryController::class,'delete']);

Route::get('/addproduct',[ProductController::class,'addproduct']);
Route::get('/products',[ProductController::class,'products']);
Route::post('/saveproduct',[ProductController::class,'saveproduct']);
Route::get('/edit_product/{id}', [ProductController::class,'editproduct']);
Route::post('/updateproduct',[ProductController::class,'updateproduct']);
Route::get('/delete_product/{id}',[ProductController::class,'delete_product']);
Route::get('/activate_product/{id}',[ProductController::class,'activate_product']);
Route::get('/unactivate_product/{id}',[ProductController::class,'unactivate_product']);

Route::get('/addslider',[SliderController::class,'addslider']);
Route::get('/sliders',[SliderController::class,'sliders']);
Route::post('/saveslider',[SliderController::class,'saveslider']);
Route::get('/edit_slider/{id}', [SliderController::class,'edit_slider']);
Route::post('/updateslider',[SliderController::class,'updateslider']);
Route::get('/delete_slider/{id}', [SliderController::class,'delete_slider']);
Route::get('/activate_slider/{id}',[SliderController::class,'activate_slider']);
Route::get('/unactivate_slider/{id}',[SliderController::class,'unactivate_slider']);

Route::get('/orders',[AdminController::class,'orders']);

