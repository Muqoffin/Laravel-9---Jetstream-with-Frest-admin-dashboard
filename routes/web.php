<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => env('BACKEND_PATH')], function () {
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', [App\Http\Controllers\Backend\AccountController::class, 'account'])->name(env('BACKEND_PATH').'.account');
        Route::get('/security', [App\Http\Controllers\Backend\AccountController::class, 'security'])->name(env('BACKEND_PATH').'.account.security');
    });
});
