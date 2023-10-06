<?php

use App\Http\Controllers\AdminPanel\LoginController;
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
Route::get('/admin/login', [LoginController::class,'showLoginForm'])->name('admin.login');

Route::post('/admin/login/post', [LoginController::class,'login'])->name('admin.login_post');

Route::group(['middleware' => 'admin_authenticated'], function () {

    Route::get('/admin/dashboard', function () {
        return view('AdminPanel.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/logout',[LoginController::class,'logout'])->name('admin.logout');

});