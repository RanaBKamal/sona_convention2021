<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\WorkFilesController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/page/{slug}', [PagesController::class, 'page']);


Auth::routes(['verify' => true]);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/work_files', [HomeController::class, 'storeWorkFile'])->middleware(['auth', 'verified']);
Route::get('/work_files/{id}', [HomeController::class, 'destroyWorkFile'])->middleware(['auth', 'verified']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
