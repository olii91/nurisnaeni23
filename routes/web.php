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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->middleware(['checkLevel:petugas'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->middleware(['checkLevel:petugas'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->middleware(['checkLevel:petugas'])->name('user.store');
Route::get('user/edit{id}', [App\Http\Controllers\UserController::class, 'edit'])->middleware(['checkLevel:petugas'])->name('user.edit');
Route::put('user/update{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware(['checkLevel:petugas'])->name('user.update');
Route::get('user/show{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware(['checkLevel:petugas'])->name('user.show');
Route::delete('user/delete{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware(['checkLevel:petugas'])->name('user.delete');

Route::get('masyarakat', [App\Http\Controllers\MasyarakatController::class, 'index'])->middleware(['checkLevel:petugas'])->name('masyarakat.index');
Route::get('masyarakat/create', [App\Http\Controllers\MasyarakatController::class, 'create'])->middleware(['checkLevel:petugas'])->name('masyarakat.create');
Route::post('masyarakat/store', [App\Http\Controllers\MasyarakatController::class, 'store'])->middleware(['checkLevel:petugas'])->name('masyarakat.store');
Route::get('masyarakat/edit{id}', [App\Http\Controllers\MasyarakatController::class, 'edit'])->middleware(['checkLevel:petugas'])->name('masyarakat.edit');
Route::put('masyarakat/update{id}', [App\Http\Controllers\MasyarakatController::class, 'update'])->middleware(['checkLevel:petugas'])->name('masyarakat.update');
Route::get('masyarakat/show{id}', [App\Http\Controllers\MasyarakatController::class, 'show'])->middleware(['checkLevel:petugas'])->name('masyarakat.show');
Route::delete('masyarakat/delete{id}', [App\Http\Controllers\MasyarakatController::class, 'destroy'])->middleware(['checkLevel:petugas'])->name('masyarakat.delete');



