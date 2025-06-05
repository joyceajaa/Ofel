<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\MenuController as UserMenuController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MenuController as PublicMenuController;
use App\Http\Controllers\FeedbackController as PublicFeedbackController; // Alias for public
use App\Http\Controllers\Admin\FeedbackController; // Use the Admin Controller
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WilayahController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// == RUTE PUBLIK ==
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/menu', [PublicMenuController::class, 'indexPublic'])->name('menu');
Route::get('/menu/{menu}', [PublicMenuController::class, 'showPublic'])->name('menu.show');
Route::get('/about', [AboutController::class, 'indexPublic'])->name('about');
Route::get('/locationpublic', [LocationController::class, 'indexPublic'])->name('locations.indexPublic');
Route::get('/feedback', [PublicFeedbackController::class, 'indexPublic'])->name('feedback'); // Use the Public Controller
Route::get('/contact', [ContactController::class, 'showPublic'])->name('contact');


// == RUTE KHUSUS USER (Login) ==
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/menu', [UserMenuController::class, 'index'])->name('user.menu.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.user');
    Route::post('/contact', [ContactController::class, 'store']);
});

// == RUTE AUTENTIKASI (Untuk Guest / Tamu) ==
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/registrasi', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/registrasi', [AuthController::class, 'register'])->name('register.post');
});

// == RUTE AUTENTIKASI (Logout) ==
Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');


// == RUTE ADMIN ==
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Halaman admin umum
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    Route::get('/about', [AdminController::class, 'about'])->name('about');
    Route::get('/location', [LocationController::class, 'index'])->name('location');
    Route::get('/contact', [AdminController::class, 'contact'])->name('contact');

    // Feedback
    Route::resource('feedback', FeedbackController::class)->names([
      'index' => 'feedback.index',
      'create' => 'feedback.create',
      'store' => 'feedback.store',
      'show' => 'feedback.show',
      'edit' => 'feedback.edit',
      'update' => 'feedback.update',
      'destroy' => 'feedback.destroy',
    ]);

    // CRUD Menu
     Route::resource('menus', PublicMenuController::class)->except(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
    Route::get('/menus', [AdminMenuController::class, 'index'])->name('menus.index');
    Route::get('/menus/create', [PublicMenuController::class, 'create'])->name('menus.create');
    Route::post('/menus', [PublicMenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/{menu}', [PublicMenuController::class, 'show'])->name('menus.show');
    Route::get('/menus/{menu}/edit', [PublicMenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menus/{menu}', [PublicMenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{menu}', [PublicMenuController::class, 'destroy'])->name('menus.destroy');

    // CRUD Lokasi
    Route::resource('locations', LocationController::class);

    // CRUD About
    Route::resource('abouts', AboutController::class);

    // CRUD Wilayah
    Route::resource('wilayahs', WilayahController::class);

    // CRUD Contact
    Route::resource('contacts', ContactController::class);
    //Route::prefix('admin')->group(function(){ // REMOVE THIS. It creates duplicate route
    //     Route::resource('contacts', ContactController::class);
    //});

});