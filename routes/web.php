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
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\HotelCategories_Controller;
use App\Http\Controllers\Admin\HotelLocation_Controller;
use App\Http\Controllers\Admin\HotelRoom_Controller;
use App\Http\Controllers\Admin\RoomOption_Controller;
use App\Http\Controllers\Admin\HotelPoicies_Controller;
use App\Http\Controllers\Admin\HotelManager_Controller;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\clients\ClientsHotelController;
use Illuminate\Support\Facades\Route;

//TEST MAIL
//Route::get('/send-test-email', function () {
//    Mail::to('test@gmail.com')->send(new TestMail());
//    return 'Test email sent successfully!';
//});
//Route client
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hotels', [ClientsHotelController::class, 'index'])->name('hotels');
Route::get('/hotels/{hotel_category_id}', [ClientsHotelController::class, 'hotelRoomShow'])->name('hotels.show');


//Route admin
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
    Route::get('vouchers/generateRandomCode', [VoucherController::class, 'generateRandomCode'])->name('vouchers.generateRandomCode');
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
    Route::get('test', [TestController::class, 'index'])->name('test.index');

    // Add hotel management routes here
    Route::prefix('hotel-management')->group(function () {
        Route::get('hotel-rooms', [HotelRoom_Controller::class, 'index'])->name('hotelRooms.index');
        Route::get('room-options', [RoomOption_Controller::class, 'index'])->name('roomOptions.index');
        Route::post('room-options', [RoomOption_Controller::class, 'store'])->name('roomOptions.store');
        Route::get('hotel-policies', [HotelPoicies_Controller::class, 'index'])->name('hotelPolicies.index');
    });

    Route::get('hotel_manager', [HotelManager_Controller::class, 'index'])->name('hotel_manager.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes are for users who are not logged in
Route::group(['middleware' => 'guest'], function () {
    // Login
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost']);

    // Register
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerPost'])->name('registerPost');
    Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
    Route::get('/verify-otp', [AuthController::class, 'verifyOtpForm'])->name('verifyOtpForm');

    // Forgot password
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
    Route::get('password/reset/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset.form');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
    Route::get('/verify-otp', [AuthController::class, 'verifyOtpForm'])->name('verifyOtpForm');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verifyOtp');
});

// Routes are for logged in users
Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Route Google login
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
