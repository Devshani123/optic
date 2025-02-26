<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClubOwnerController;
use App\Http\Controllers\ClubController;
use App\Http\Middleware\IsClubOwner;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PayPalController;


// welocme page route
Route::get('/', function () {
    return view('home');
})->name('home');

//dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegistrationController::class, 'register']);

// Authenticated routes group with additional role-based dashboards
Route::middleware('auth')->group(function () {
    // Admin Dashboard
    Route::prefix('admin')->middleware('is_admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    });

    // Club Owner Dashboard
    Route::prefix('club-owner')->middleware([IsClubOwner::class])->group(function () {
        // Club Owner Dashboard
        Route::get('/dashboard', [ClubOwnerController::class, 'dashboard'])->name('clubowner.dashboard');
        
        // Club Owner Club Management
        Route::get('/clubs', [ClubOwnerController::class, 'myClubs'])->name('clubowner.clubs');
        Route::get('/clubs/register', [ClubController::class, 'register'])->name('clubs.register');
        Route::post('/clubs', [ClubController::class, 'store'])->name('clubs.store');

        // Event Routes for Club Owner
        Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->name('events.store');

        

    });
});

// Clubs Discover route
Route::get('/discover', [ClubController::class, 'discover'])->name('clubs.discover');

Route::get('/clubs/my', [ClubController::class, 'myClubs'])->name('clubs.my');

Route::get('/clubs/physical', [ClubController::class, 'showPhysicalClubs'])->name('clubs.physical');
Route::get('/clubs/non-physical', [ClubController::class, 'showNonPhysicalClubs'])->name('clubs.nonPhysical');
Route::post('/clubs/join/{club_id}', [ClubController::class, 'join'])->name('clubs.join');


// Include additional authentication routes
require __DIR__.'/auth.php';


// PayPal Routes
Route::middleware('auth')->group(function () {
    Route::get('/payment', [PayPalController::class, 'createPayment'])->name('payment.create');
    Route::get('/payment/success', [PayPalController::class, 'handleSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [PayPalController::class, 'handleCancel'])->name('payment.cancel');
});

