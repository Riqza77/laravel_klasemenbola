<?php

use App\Http\Controllers\KlubController;
use App\Http\Controllers\SkorController;
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

Route::get('/', [KlubController::class, 'index'])->name('form-klub');
Route::post('/store_klub',[KlubController::class, 'add'])->name('post-klub');

Route::get('/skor',[SkorController::class, 'index'])->name('form-skor');
Route::post('/skor',[SkorController::class, 'add'])->name('post-skor');

Route::get('/klasemen',[KlubController::class, 'klasemen'])->name('klasemen');
