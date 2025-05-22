<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\MenuController as UserMenuController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MenuController as PublicMenuController;
use App\Http\Controllers\FeedbackController;
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
Route::get('/feedback', [FeedbackController::class, 'indexPublic'])->name('feedback');
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
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');

    // CRUD Menu
    Route::get('/menus', [AdminMenuController::class, 'index'])->name('menus.index');
    Route::get('/menus/create', [PublicMenuController::class, 'create'])->name('menus.create');
    Route::post('/menus', [PublicMenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/{menu}', [PublicMenuController::class, 'show'])->name('menus.show');
    Route::get('/menus/{menu}/edit', [PublicMenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menus/{menu}', [PublicMenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{menu}', [PublicMenuController::class, 'destroy'])->name('menus.destroy');

    // CRUD Lokasi
    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
    Route::get('/locations/{location}', [LocationController::class, 'show'])->name('locations.show');
    Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('locations.edit');
    Route::put('/locations/{location}', [LocationController::class, 'update'])->name('locations.update');
    Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');

    // CRUD About
    Route::get('/abouts', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('/abouts/create', [AboutController::class, 'create'])->name('abouts.create');
    Route::post('/abouts', [AboutController::class, 'store'])->name('abouts.store');
    Route::get('/abouts/{about}', [AboutController::class, 'show'])->name('abouts.show');
    Route::get('/abouts/{about}/edit', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::put('/abouts/{about}', [AboutController::class, 'update'])->name('abouts.update');
    Route::delete('/abouts/{about}', [AboutController::class, 'destroy'])->name('abouts.destroy');

    // CRUD Wilayah
    Route::get('/wilayahs', [WilayahController::class, 'index'])->name('wilayahs.index');
    Route::get('/wilayahs/create', [WilayahController::class, 'create'])->name('wilayahs.create');
    Route::post('/wilayahs', [WilayahController::class, 'store'])->name('wilayahs.store');
    Route::get('/wilayahs/{wilayah}', [WilayahController::class, 'show'])->name('wilayahs.show');
    Route::get('/wilayahs/{wilayah}/edit', [WilayahController::class, 'edit'])->name('wilayahs.edit');
    Route::put('/wilayahs/{wilayah}', [WilayahController::class, 'update'])->name('wilayahs.update');
    Route::delete('/wilayahs/{wilayah}', [WilayahController::class, 'destroy'])->name('wilayahs.destroy');

    // CRUD Contact
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/admin/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/admin/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/admin/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('/admin/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/admin/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/admin/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});
