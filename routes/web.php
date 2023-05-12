<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\NameMatchMaking;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->as('auth.')->group(function (){
    Route::view('login', 'auth.login')->name('login');
    Route::post('login', 'login');

    Route::view('register', 'auth.register')->name('register');
    Route::post('register', 'register');
});

Route::middleware('auth:web')->group(function (){
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('name-match-making', NameMatchMaking::class)->name('name-match-making');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
