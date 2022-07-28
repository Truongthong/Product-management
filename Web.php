<?php
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

// redirects to the Product Resource Controller
Route::get('/', function () {
    return redirect('/products');
});
Route::resource('products', ProductController::class);

