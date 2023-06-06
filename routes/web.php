<?php

use App\Http\Controllers\ArtController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRouteController;
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
Route::get("/",[JobsController::class, 'index']);
Route::get("/login", [UserRouteController::class, 'login']);
Route::post("/register", [UserController::class, 'register']);
Route::post('/loginFunc', [UserController::class, 'login']);
Route::get('/signup', [UserRouteController::class, 'signup']);
Route::resource("jobs", JobsController::class);
Route::get("listing/me", [JobsController::class, 'showUserJobs']);
Route::post("logout", [JobsController::class, 'logout']);
