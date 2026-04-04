<?php

use App\Http\Controllers\Admin\CarriersController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\DeparturesController;
use App\Http\Controllers\Admin\RoutesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/departures', [\App\Http\Controllers\DeparturesController::class, 'index'])->name('departures.index');
Route::get('/departures/search', [\App\Http\Controllers\DeparturesController::class, 'search'])->name('departures.search');

Route::get('/author', function (){
    return view('pages.client.author');
})->name('author.index');
Route::post('newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/login', [LoginController::class, 'index'])->name('login.index')
    ->middleware(GuestMiddleware::class);
Route::post('/login', [LoginController::class, 'login'])->name('login.login')
    ->middleware(GuestMiddleware::class);
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout')
    ->middleware(UserMiddleware::class);

Route::get('/register', [RegisterController::class, 'index'])->name('register.index')
    ->middleware(GuestMiddleware::class);
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')
    ->middleware(GuestMiddleware::class);
Route::get('/register/activate/{token}', [RegisterController::class, 'activate'])->name('register.activate')
    ->middleware(GuestMiddleware::class);

Route::get('/ajax/cities', [CityController::class, 'search'])->name('cities.search');

Route::prefix('admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', function () {return view('pages.admin.index');})->name('index');
    Route::resource('/cities', CitiesController::class);
    Route::resource('/carriers', CarriersController::class);
    Route::resource('/routes', RoutesController::class);
    Route::resource('/departures', DeparturesController::class);
});
