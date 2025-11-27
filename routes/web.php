<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get("/articles",[ProductController::class,"index"]);

Route::get('/', [ProductController::class, "index"]);

Route::middleware("auth")->group(function(){

    Route::get("/cartitems/add/{id}",[CartItemController::class,"create"]);
    Route::get("/cartitems/view",[CartItemController::class,"view"]);      
    Route::get("/cartitems/remove/{id}",[CartItemController::class,"remove"]);
    Route::get("/cartitems/addstock/{id}",[CartItemController::class,"add"]);
    Route::get("/cartitems/reducestock/{id}",[CartItemController::class,"reduce"]);

    Route::get("/orders/checkout",[OrderController::class,"order"]);
    Route::post("/orders/checkout",[OrderController::class,"checkout"]);
    Route::get("/orders/receipt/{id}",[OrderController::class,"receipt"])->name("orders.receipt");
});

Route::middleware("admin")->group(function(){

    Route::get("articles/add",[ProductController::class,"add"]);
    Route::post("articles/add",[ProductController::class,"create"]);
    Route::get("/articles/edit/{id}",[ProductController::class,"edit"]);
    Route::get("/articles/delete/{id}",[ProductController::class,"delete"]);
    Route::post("/articles/update/{id}",[ProductController::class,"update"]);

    Route::get("/dashbord",[AdminController::class,"show"]);
});

Route::get("/home",[ProductController::class,"index"]);

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

