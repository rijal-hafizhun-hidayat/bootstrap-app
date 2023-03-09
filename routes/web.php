<?php

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

Route::get('/', function () {
    return Inertia::render('welcome/Index');
})->name('welcome');

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.auth');

Route::middleware(['isLogin'])->group(function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout.auth');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //akun
    Route::get('/akun', [App\Http\Controllers\AkunController::class, 'index'])->name('akun');
    Route::get('/akun/create', [App\Http\Controllers\AkunController::class, 'create'])->name('akun.create');
    Route::get('/akun/edit', [App\Http\Controllers\AkunController::class, 'edit'])->name('akun.edit');
    Route::post('/akun', [App\Http\Controllers\AkunController::class, 'store'])->name('akun.store');
    Route::delete('/akun/{id}', [App\Http\Controllers\AkunController::class, 'destroy'])->name('akun.destroy');

    //profile
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
});
