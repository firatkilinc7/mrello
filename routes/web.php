<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseropController;
use App\Http\Controllers\PanoController;

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




Route::group(['prefix'=>'','middleware'=>'CheckLogin'], function (){

    /*
    * Kullanıcı girişi gereken sayfalar buraya yazılacak!
    */

});


Route::get("login", [UseropController::class, "loginForm"])->name("loginForm");

Route::get("/", [PanoController::class, "indexExample"]);


Route::post("task/create", [PanoController::class, "testASD"]);



