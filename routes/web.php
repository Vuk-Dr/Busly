<?php

use App\Http\Controllers\Admin\CarriersController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\DeparturesController;
use App\Http\Controllers\Admin\RoutesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/departures', [\App\Http\Controllers\DeparturesController::class, 'index'])->name('departures.index');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/activate/{token}', [RegisterController::class, 'activate'])->name('register.activate');

Route::get('/ajax/cities', [CityController::class, 'search'])->name('cities.search');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {return view('pages.admin.index');})->name('index');
    Route::resource('/cities', CitiesController::class);
    Route::resource('/carriers', CarriersController::class);
    Route::resource('/routes', RoutesController::class);
    Route::resource('/departures', DeparturesController::class);
});
