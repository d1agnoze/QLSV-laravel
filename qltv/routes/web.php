<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\DanhmucController;

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
Route::get('/admin/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/login/store',[LoginController::class,'store']);

//Route::get('/admin/main',[MainController::class,'index'])->name('admin')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('main',[MainController::class,'index'])->name('admin');
        Route::prefix('danhmuc')->group(function () {
            Route::get('add',[DanhmucController::class,'create']);
            Route::post('add/store',[DanhmucController::class,'store']);
            Route::get('list/{search?}/{order?}',[DanhmucController::class,'list'])->name('list');
            Route::get('edit/{danhmuc}',[DanhmucController::class,'edit']);
            Route::post('edit/{danhmuc}',[DanhmucController::class,'postedit']);
            Route::delete('delete',[DanhmucController::class,'delete']);
            Route::post('list/setpage',[DanhmucController::class,'setLimit']);
            // Route::DELETE('delete',[DanhmucController::class,'delete']);
        });
    });
});
