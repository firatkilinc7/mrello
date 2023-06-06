<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseropController;
use App\Http\Controllers\PanoController;
use App\Http\Middleware\CheckLogin;

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

Route::group(['middleware'=>CheckLogin::class], function (){
    Route::get("/", [PanoController::class, "index"])->name("homepage");

});









Route::get("login", [UseropController::class, "loginForm"])->name("loginForm");
Route::post("login/do-login", [UseropController::class, "doLogin"]);
Route::get("logout", [UseropController::class, "doLogout"]);
Route::post("register/do-register", [UseropController::class, "doRegister"]);




// AJAX CAGRILARI POST METOTLARI
Route::post("task/create", [PanoController::class, "createTask"]);
Route::post("task/delete", [PanoController::class, "deleteTask"]);
Route::post("task/delete-all", [PanoController::class, "deleteAllTask"]);
Route::post("task/update", [PanoController::class, "updateTask"]);
Route::post("list/create", [PanoController::class, "createList"]);
Route::post("list/delete", [PanoController::class, "deleteList"]);
Route::post("list/update", [PanoController::class, "updateList"]);





