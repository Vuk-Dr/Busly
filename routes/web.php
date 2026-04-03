<?php

use App\Http\Controllers\Admin\CarriersController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\RoutesController;
use App\Http\Controllers\client\CityController;
use App\Http\Controllers\DeparturesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/departures', [DeparturesController::class, 'index'])->name('departures.index');

Route::get('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/ajax/cities', [CityController::class, 'search'])->name('cities.search');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {return view('pages.admin.index');})->name('index');
    Route::resource('/cities', CitiesController::class);
    Route::resource('/carriers', CarriersController::class);
    Route::resource('/routes', RoutesController::class);
});
