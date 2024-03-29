<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::view('/', 'index');
Route::get('dashboard', [App\Http\Controllers\PageController::class, 'dashboard'])->middleware('auth:sanctum')->name('dashboard');
Route::resource('students', App\Http\Controllers\StudentController::class)->middleware(['auth:sanctum', 'tutor']);
Route::resource('rides', App\Http\Controllers\RideController::class)->middleware(['auth:sanctum']);
Route::resource('cars', App\Http\Controllers\CarController::class)->middleware(['auth:sanctum']);

