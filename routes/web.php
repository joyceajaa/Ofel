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
use App\Http\Controllers\FeedbackController; // Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// == Rute Publik ==
Route::get('/', function () {
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return view('welcome');
})->name('welcome');

Route::get('/menu', [PublicMenuController::class, 'indexPublic'])->name('menu');
Route::get('/menu/{menu}', [PublicMenuController::class, 'showPublic'])->name('menu.show');
Route::get('/about', fn() => view('about.index'))->name('about');
Route::get('/location', fn() => view('location.index'))->name('location');
Route::get('/feedback', fn() => view('feedback.index'))->name('feedback');
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

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/about', [AdminController::class, 'about'])->name('admin.about');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/about', [AdminController::class, 'about'])->name('about');
    Route::get('/location', [AdminController::class, 'location'])->name('location');
    Route::get('/feedback', [AdminController::class, 'feedback'])->name('feedback');
    Route::get('/contact', [AdminController::class, 'contact'])->name('contact');
});


// == Rute Publik (Bisa diakses siapa saja) ==
Route::get('/', function () {
    // Jika user sudah login dan dia admin, redirect ke admin dashboard
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    // Jika sudah login dan bukan admin, atau belum login, tampilkan welcome
    return view('welcome');
})->name('welcome');

// Harus login dulu untuk bisa akses halaman ini
Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store']);
});

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::get('/menu', [MenuController::class, 'indexPublic'])->name('menu'); // Menampilkan daftar menu untuk publik
Route::get('/menu/{menu}', [MenuController::class, 'showPublic'])->name('menu.show'); // Menampilkan detail menu untuk publik

Route::get('/location', function () {
    return view('location.index');
})->name('location');

// Rute feedback
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

Route::middleware(['auth'])->group(function () {
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});


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
         ->group(function () {

            // Contoh: Dashboard Admin
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('admin.dashboard');

            // Rute Menu Admin (CRUD) - Didefinisikan manual
            Route::get('/menus', [MenuController::class, 'index'])->name('admin.menus.index');
            Route::get('/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
            Route::post('/menus', [MenuController::class, 'store'])->name('admin.menus.store');
            Route::get('/menus/{menu}', [MenuController::class, 'show'])->name('admin.menus.show');
            Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
            Route::put('/menus/{menu}', [MenuController::class, 'update'])->name('admin.menus.update');
            Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');


            // Tambahkan rute admin lainnya di sini
            // Contoh: Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');

    });

    // Catatan: Rute untuk pelanggan ('welcome') sudah didefinisikan di bagian publik.
    // AuthController akan mengarahkan pelanggan yang login ke route('welcome').
    // Jika ada halaman lain yang *hanya* bisa diakses pelanggan (bukan admin),
    // Anda bisa menambahkannya di sini, di luar grup 'admin'.
    // Contoh:
    // Route::get('/my-orders', function() {
    //     if (Auth::user()->is_admin) {
    //          abort(403); // Admin tidak boleh akses halaman pesanan pelanggan
    //     }
    //     return view('orders.my_orders');
    // })->name('my.orders');

});

// Pastikan Controller diupdate untuk menggunakan view yang benar
// Dalam AuthController.php:
// - showLoginForm() harus return view('login.index');
// - showRegisterForm() harus return view('registrasi.index');
