<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarLocation_Controller;
use App\Http\Controllers\ListCategories_Controller;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\FlightCategories_Controller;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightLocation_Controller;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TourCategories_Controller;
use App\Http\Controllers\TourLocation_Controller;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\HotelCategories_Controller;
use App\Http\Controllers\Admin\HotelLocation_Controller;
use App\Http\Controllers\Admin\HotelRoom_Controller;

use App\Http\Controllers\clients\ClientsHotelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hotels', [ClientsHotelController::class, 'index'])->name('hotels');




//Route::middleware(['auth', 'admin'])->group(function () {
//    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
//});
Route::prefix('admin')->as('admin.')->middleware('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('listCategories', ListCategories_Controller::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('tours', ToursController::class);
    Route::resource('galleries', GalleriesController::class);
    Route::resource('messages', MessagesController::class);
    Route::resource('users', UserController::class);
    Route::resource('vouchers', VoucherController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('flights', FlightController::class);
    Route::resource('cars', CarController::class);
    Route::resource('flightCategories', FlightCategories_Controller::class);
    Route::resource('tourCategories', TourCategories_Controller::class);
    Route::resource('hotelCategories', HotelCategories_Controller::class);
    Route::resource('hotelLocations', HotelLocation_Controller::class);
    Route::resource('rooms', HotelRoom_Controller::class);
    Route::resource('tourLocations', TourLocation_Controller::class);
    Route::resource('flightLocations', FlightLocation_Controller::class);
    Route::resource('carLocations', CarLocation_Controller::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost']);
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerPost']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');
    Route::get('password/reset/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
