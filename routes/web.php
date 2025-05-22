<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\MenuController as UserMenuController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MenuController as PublicMenuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Admin\AboutController; // <-- Tambahkan ini
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WilayahController; // <-- Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// == Rute Publik ==
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/menu', [PublicMenuController::class, 'indexPublic'])->name('menu');
Route::get('/menu/{menu}', [PublicMenuController::class, 'showPublic'])->name('menu.show');
Route::get('/about', [AboutController::class, 'indexPublic'])->name('about');
// Route::get('/location', fn() => view('location.index'))->name('location');
Route::get('/locationpublic', [LocationController::class, 'indexPublic'])->name('locations.indexPublic');
Route::get('/feedback', [FeedbackController::class, 'indexPublic'])->name('feedback');
Route::get('/contact', fn() => view('contact.index'))->name('contact');


Route::get('/menu', [MenuController::class, 'index']);

// Route untuk admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/menu', [AdminMenuController::class, 'index'])->name('admin.menu.index');
});

// Route untuk user
Route::middleware('auth')->group(function () {
    Route::get('/menu', [UserMenuController::class, 'index'])->name('user.menu.index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/about', [AboutController::class, 'indexPublic'])->name('aboutssss');
    Route::get('/location', [LocationController::class, 'index'])->name('location');
    Route::get('/contact', [AdminController::class, 'contact'])->name('contact');
});

// == Rute Publik (Bisa diakses siapa saja) ==


// Harus login dulu untuk bisa akses halaman ini
Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store']);
});

// Route::get('/about', function () {
//     return view('about.index');
// })->name('about');

Route::get('/menu', [MenuController::class, 'indexPublic'])->name('menu'); // Menampilkan daftar menu untuk publik
Route::get('/menu/{menu}', [MenuController::class, 'showPublic'])->name('menu.show'); // Menampilkan detail menu untuk publik

Route::get('/location', function () {
    return view('location.index');
})->name('location');

// Rute feedback
// Route::middleware(['auth'])->group(function () {
//     Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
//     Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
// });


Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');


// == Rute Autentikasi (Hanya untuk Tamu / Guest) ==
Route::middleware('guest')->group(function () {
    // Tampilkan Form Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])
         ->name('login');

    // Proses Login
    Route::post('/login', [AuthController::class, 'login'])
          ->name('login.post');

    // Tampilkan Form Registrasi
    Route::get('/registrasi', [AuthController::class, 'showRegisterForm'])
         ->name('register');

    // Proses Registrasi
    Route::post('/registrasi', [AuthController::class, 'register'])
          ->name('register.post');
});


// == Rute yang Membutuhkan Login (Authenticated Users) ==
Route::middleware('auth')->group(function () {

    // Proses Logout (Harus POST untuk keamanan CSRF)
    Route::post('/logout', [AuthController::class, 'logout'])
          ->name('logout');

     // == Rute Khusus Admin ==
     Route::prefix('admin')
     ->middleware('admin')
     ->name('admin.')
     ->group(function () {

         // Contoh: Dashboard Admin
         Route::get('/dashboard', function () {
             return view('admin.dashboard');
         })->name('dashboard');

         Route::get('/about', [AdminController::class, 'about'])->name('aboutsss');
         Route::get('/location', [LocationController::class, 'index'])->name('location');
         Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
         Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
         Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
         Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
         Route::get('/contact', [AdminController::class, 'contact'])->name('contact');

         // Rute Menu Admin (CRUD) - Didefinisikan manual
         Route::get('/menus', [AdminMenuController::class, 'index'])->name('menus.index');
         Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
         Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
         Route::get('/menus/{menu}', [MenuController::class, 'show'])->name('menus.show');
         Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
         Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('menus.update');
         Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

         // Rute Lokasi Admin (CRUD) - Didefinisikan manual
         Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
         Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
         Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
         Route::get('/locations/{location}', [LocationController::class, 'show'])->name('locations.show');
         Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('locations.edit');
         Route::put('/locations/{location}', [LocationController::class, 'update'])->name('locations.update');
         Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');

         // Route About Us Admin (CRUD) - Didefinisikan manual
         Route::get('/abouts', [AboutController::class, 'index'])->name('abouts.index');
         Route::get('/abouts/create', [AboutController::class, 'create'])->name('abouts.create');
         Route::post('/abouts', [AboutController::class, 'store'])->name('abouts.store');
         Route::get('/abouts/{about}', [AboutController::class, 'show'])->name('abouts.show');
         Route::get('/abouts/{about}/edit', [AboutController::class, 'edit'])->name('abouts.edit');
         Route::put('/abouts/{about}', [AboutController::class, 'update'])->name('abouts.update');
         Route::delete('/abouts/{about}', [AboutController::class, 'destroy'])->name('abouts.destroy');

         // == Rute Wilayah Admin (CRUD) - Didefinisikan manual ==
         Route::get('/wilayahs', [WilayahController::class, 'index'])->name('wilayahs.index');
         Route::get('/wilayahs/create', [WilayahController::class, 'create'])->name('wilayahs.create');
         Route::post('/wilayahs', [WilayahController::class, 'store'])->name('wilayahs.store');
         Route::get('/wilayahs/{wilayah}', [WilayahController::class, 'show'])->name('wilayahs.show');
         Route::get('/wilayahs/{wilayah}/edit', [WilayahController::class, 'edit'])->name('wilayahs.edit');
         Route::put('/wilayahs/{wilayah}', [WilayahController::class, 'update'])->name('wilayahs.update');
         Route::delete('/wilayahs/{wilayah}', [WilayahController::class, 'destroy'])->name('wilayahs.destroy');
     });
});
