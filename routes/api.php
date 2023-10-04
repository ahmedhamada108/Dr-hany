<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AwardsContoller;
use App\Http\Controllers\AdminPanel\LoginController;
use App\Http\Controllers\AdminPanel\SliderContoller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('/user', function () {
//     return response()->json(['message' => 'Hello World!']);
// })->middleware('admin_authenticated');



Route::post('/login',[LoginController::class,'login']);
Route::group(['middleware' => 'admin_authenticated'], function () {
    
    Route::apiResource('slider',SliderContoller::class);

    Route::apiResource('awards',AwardsContoller::class);
});