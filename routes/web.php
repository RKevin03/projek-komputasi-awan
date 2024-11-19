<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::resource('products', HomeController::class);

// Route::get('download-file/{productId}', [
//     HomeController::class, 'productId'
// ])->name('products.downloadFile');

Route::get('/products/download/{productId}', [HomeController::class, 'downloadFile'])->name('products.downloadFile');

Route::get('getProducts', [HomeController::class, 'getData'])->name('products.getData');

// Route::get('exportExcel', [HomeController::class, 'exportExcel'])->name('products.exportExcel');
