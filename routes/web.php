<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//define route
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\MakananPokokController;
use App\Http\Controllers\InfaqController;
use App\Models\InfaqModel;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');

Route::middleware(['isLogin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.auth');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //akun
    Route::get('/akun', [AkunController::class, 'index'])->name('akun');
    Route::get('/akun/create', [AkunController::class, 'create'])->name('akun.create');
    Route::get('/akun/{id}', [AkunController::class, 'edit'])->name('akun.edit');
    Route::post('/akun', [AkunController::class, 'store'])->name('akun.store');
    Route::delete('/akun/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
    Route::put('/akun/{id}', [AkunController::class, 'update'])->name('akun.update');

    //zakat
    Route::get('/zakat', [ZakatController::class, 'index'])->name('zakat');
    Route::get('/zakat/{id}', [ZakatController::class, 'edit'])->name('zakat.edit');
    Route::get('/zakat/add', [ZakatController::class, 'create'])->name('zakat.create');
    Route::post('/zakat', [ZakatController::class, 'store'])->name('zakat.store');
    Route::delete('/zakat/{id}', [ZakatController::class, 'destroy'])->name('zakat.destroy');
    Route::put('/zakat/{id}', [ZakatController::class, 'update'])->name('zakat.update');

    //infaq
    Route::get('/infaq', [InfaqController::class, 'index'])->name('infaq');
    Route::get('/infaq/add', [InfaqController::class, 'create'])->name('infaq.create');
    Route::get('/infaq/{id}', [InfaqController::class, 'show'])->name('infaq.show');
    Route::put('/infaq/{id}', [InfaqController::class, 'update'])->name('infaq.update');
    Route::post('/infaq', [InfaqController::class, 'store'])->name('infaq.store');
    Route::delete('/infaq/{id}', [InfaqController::class, 'destroy'])->name('infaq.destroy');

    //makanan pokok
    Route::get('/makanan-pokok', [MakananPokokController::class, 'index'])->name('makanan-pokok');
    Route::get('/makanan-pokok/create', [MakananPokokController::class, 'create'])->name('makanan-pokok.create');
    Route::get('/makanan-pokok/{id}', [MakananPokokController::class, 'edit'])->name('makanan-pokok.edit');
    Route::post('/makanan-pokok', [MakananPokokController::class, 'store'])->name('makanan-pokok.store');
    Route::delete('/makanan-pokok/{id}', [MakananPokokController::class, 'destroy'])->name('makanan-pokok.destroy');
    Route::put('/makanan-pokok/{id}', [MakananPokokController::class, 'update'])->name('makanan-pokok.update');

    //profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    //profile API
    Route::get('/getUsername', [ProfileController::class, 'getUsername'])->name('getUsername');
    Route::get('/getPassword', [ProfileController::class, 'getPassword'])->name('getPassword');
    Route::put('/updateUsername', [ProfileController::class, 'updateUsername'])->name('updateUsername');
    Route::put('/updatePassword', [ProfileController::class, 'updatePassword'])->name('updatePassword');

});
