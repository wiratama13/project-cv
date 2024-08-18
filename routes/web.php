<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KarirController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\UserDetailController;



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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login-form')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register-form');
Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/error/403', [LoginController::class, 'error'])->name('error.403');

Route::middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::resource('usercv', UserDetailController::class);
    Route::resource('karir', KarirController::class);
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('keahlian', KeahlianController::class);
    Route::get('/cv', [HomeController::class, 'printcv'])->name('print.cv');
    Route::get('/send-to-hr', [HomeController::class, 'viewSendHR'])->name('view.hr');
    Route::post('/send-to-hr', [HomeController::class, 'SendHR'])->name('send.hr');

    Route::resource('about', AboutController::class);
});

Route::get('/download-cv/{id}', [HomeController::class, 'download'])->name('download.cv');

Route::get('/hr', [HomeController::class, 'pageHR'])->name('page.hr')->middleware(['auth', 'isHR']);