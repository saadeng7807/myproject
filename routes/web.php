<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProdctsController;
use App\Http\Controllers\Shopping;




Route::get('/',[Shopping::class,'GetCategories'])->name('index');

Auth::routes();

Route::prefix('shopping')->group(function(){

    Route::get('/list/{categories_id}',[Shopping::class,'List'])->name('shopping.list');
    Route::get('/details/{id}',[Shopping::class,'Details'])->name('shopping.details');
    Route::get('/addtocart',[Shopping::class,'Add_to_cart'])->name('shopping.cart');
    Route::get('/checkout',[Shopping::class,'Checkout'])->name('shopping.checkout');
    Route::post('/pay',[Shopping::class,'Pay'])->name('shopping.pay');
    
});
Route::prefix('dashboard')->middleware('auth')->group(function()
{
    Route::get('/dashboard',[Dashboard::class,'Index'])->name('dashboard');

        Route::prefix('categories')->group(function(){

        Route::get('/categories',[CategoriesController::class,'Index'])->name('categories.index');
        Route::post('/addcategories',[CategoriesController::class,'Create'])->name('categories.create');
        Route::get('/deleteitemcategories/{id}',[CategoriesController::class,'Delete'])->name('categories.Delete');
        Route::get('/edititemcategories/{id}',[CategoriesController::class,'Edit'])->name('categories.Edit');
        Route::post('/updateitemcategories',[CategoriesController::class,'Update'])->name('categories.Update');
   });

   Route::prefix('products')->group(function(){

        Route::get('/products',[ProdctsController::class,'Index'])->name('products.index');
        Route::post('/createproducts',[ProdctsController::class,'Create'])->name('products.create');
        Route::get('/deleteitemproduct/{id}',[ProdctsController::class,'Delete'])->name('products.Delete');
        Route::get('/edititemproducts/{id}',[ProdctsController::class,'Edit'])->name('products.Edit');
        Route::post('/updateproducts',[ProdctsController::class,'Update'])->name('products.Update');
   });
});









Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products',[Products::class,'GetProducts']);

Route::get('/aboutus',[Products::class,'AboutUs'])->name('AboutUs');

Route::get('/callus',[Products::class,'CallUs'])->name('callus');

Route::get('/myprod',[Products::class,'MyProducts'])->name('myprod');






