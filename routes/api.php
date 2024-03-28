<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

Route::group(["middleware" => ["auth:sanctum"]], function () {
    Route::get("/products", [ProductController::class, "index"]);
    Route::post("/logout", [AuthController::class, "logout"]);
});

Route::middleware('auth:sanctum')->get('/user', function () {
    Route::post("/products", [ProductController::class, "store"]);
});
