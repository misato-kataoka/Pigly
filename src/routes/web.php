<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register/step1', [ContactController::class, 'index']);
Route::post('/register/step2', [ContactController::class, 'create']);
Route::post('/weight_logs', [ContactController::class, 'register']);
Route::get('/login', [ContactController::class, 'login']);
Route::post('/logout', [ContactController::class, '']);
Route::post('/weight_logs/{:weightLogId}/delete', [ContactController::class, 'destroy']);

