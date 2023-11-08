<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\productController;

//START shopping and products section
Route::get('/shoppingPage', function () {
    return view('shoppingPage');
});


Route::get('/', [HomeController::class, 'index']);



Route::get('/MenShoes', [productController::class, 'menShoes']);

Route::get('/WomenShoes', [productController::class, 'womenShoes']);

Route::get('/MenClothes', [productController::class, 'menClothes']);

Route::get('/WomenClothes', [productController::class, 'womenClothes']);

//END shopping and products section

// START shopping cart
Route::get('/cart', [cartController::class, 'index'])->name('cart')->middleware('protectedCart');   
Route::post('/addItem', [cartController::class, 'addItem'])->name('addItem')->middleware('protectedCart'); 
Route::post('/removeItem', [cartController::class, 'removeItem'])->name('removeItem');
Route::post('/purchase', [cartController::class, 'purchase'])->name('purchase');

// END shopping cart

Route::get("/profile" , [UserController::class, 'preLoads']);
Route::get("/addressbook" , [UserController::class, 'profile.addressbook']);

//GET ORDER DETAILS PAGE
Route::get('/orderdetails/{userid}', [transactionController::class,'getOrderDetails'])->middleware('protectedOrders')->name('orderdetails');

// START authentication section
Auth::routes();



// Admin Section

Route::get('/admin', [productController::class, 'adminProductList'])->middleware('protectedPage');
Route::view("addProduct", "addProduct")->middleware('protectedPage');
Route::post("addProduct",[productController::class, 'addProduct'])->middleware('protectedPage');
Route::get("deleteProduct/{product_id}", [productController::class,'deleteProduct'])->middleware('protectedPage');
Route::get("updateProduct/{product_id}", [productController::class,'showProduct'])->middleware('protectedPage');
Route::post("updateProduct/{product_id}", [productController::class,'updateProduct'])->middleware('protectedPage');
Route::get('logout', [LoginController::class, 'logout']);
//END authentication section

//Profile
// Profile Page
Route::middleware(['auth'])->group(function () {
    Route::get("/profile", [UserController::class, 'preLoads'])->name("profile");
    Route::get("/profile/edit-detail", [UserController::class, 'preLoadsDetail'])->name("viewEditDetail");
    Route::get("/profile/edit-address", [UserController::class, 'preLoadsAddress'])->name("viewEditAddress");
    Route::get("/profile/edit-email", [UserController::class, 'preLoadsEmail'])->name("viewEditEmail");
    Route::get("/profile/edit-password", [UserController::class, 'preLoadsPassword'])->name("viewEditPassword");
    Route::post('/profile/edit-detail', [UserController::class, 'editDetail'])->name("editDetail");
    Route::post('/profile/edit-address', [UserController::class, 'editAddress'])->name("editAddress");
    Route::post('/profile/edit-email', [UserController::class, 'editEmail'])->name("editEmail");
    Route::post('/profile/edit-password', [UserController::class, 'editPassword'])->name("editPassword");
});
