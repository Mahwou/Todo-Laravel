<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('/index', [TodoController::class, 'index'])->name('index');
Route::get('/create', [TodoController::class, 'create'])->name('create');
Route::get('/history', [TodoController::class, 'history'])->name('history');
Route::post('/store', [TodoController::class, 'store'])->name('store');
Route::post('/status/{id}', [TodoController::class, 'status'])->name('status');
Route::post('/statusRemove/{id}', [TodoController::class, 'statusRemove'])->name('statusRemove');
Route::post('/close', [TodoController::class, 'close'])->name('close');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
Route::PUT('/update', [TodoController::class, 'update'])->name('update');

