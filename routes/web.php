<?php

use App\Http\Controllers\AdminPanel\AdminsContoller;
use App\Http\Controllers\AdminPanel\LoginController;
use App\Http\Controllers\AdminPanel\SliderContoller;
use App\Http\Controllers\AdminPanel\AwardsContoller;
use App\Http\Controllers\AdminPanel\FeedBackContoller;
use App\Http\Controllers\AdminPanel\GalleryContoller;
use App\Http\Controllers\AdminPanel\Medical_ServicesContoller;
use App\Http\Controllers\AdminPanel\Specialties_SurgeriesContoller;
use App\Http\Controllers\AdminPanel\WebsiteSettingsContoller;
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

    Route::get('/admin/dashboard',[LoginController::class,'Dashboard'])->name('admin.dashboard');

    Route::get('/admin/logout',[LoginController::class,'logout'])->name('admin.logout');

    Route::resource('/admin/slider', SliderContoller::class)->except(['show','create','edit']);

    Route::resource('/admin/awards', AwardsContoller::class)->except(['show','create','edit']);
    Route::resource('/admin/feedback', FeedBackContoller::class)->except(['show','create','edit']);
    Route::resource('/admin/gallery', GalleryContoller::class)->except(['show','create','edit']);
    Route::resource('/admin/medical_services', Medical_ServicesContoller::class)->except(['show','create','edit']);
    Route::resource('/admin/Specialties_Surgeries', Specialties_SurgeriesContoller::class)->except(['show','create','edit']);
    Route::resource('/admin/website_settings', WebsiteSettingsContoller::class)->except(['show','create','edit']);

    Route::resource('/admin/admins', AdminsContoller::class)->except(['show','create','edit']);

    Route::resource('/admin/website_settings', WebsiteSettingsContoller::class)->except(['store','show','create','edit']);
});