<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // Method showLoginForm() tetap sama

    public function showLoginForm()
    {
        if (Auth::check()) {
            // Redirect berdasarkan role ke tujuan masing-masing
            return redirect()->route(Auth::user()->is_admin ? 'admin.dashboard' : 'welcome'); // Ubah 'dashboard' ke 'welcome'
        }
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->intended(route('admin.dashboard'))
                       ->with('success', 'Selamat datang kembali, Admin!');
            } else {
                // --- PERUBAHAN DI SINI ---
                // Redirect ke route 'welcome' untuk pelanggan
                return redirect()->intended(route('welcome'))
                       ->with('success', 'Login berhasil! Selamat datang.');
            }
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->onlyInput('email');
    }

    // Method showRegisterForm() tetap sama
    public function showRegisterForm()
    {
        if (Auth::check()) {
             // Redirect berdasarkan role ke tujuan masing-masing
            return redirect()->route(Auth::user()->is_admin ? 'admin.dashboard' : 'welcome'); // Ubah 'dashboard' ke 'welcome'
        }
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => [
                'required', 'string',
                Password::min(8)->mixedCase()->numbers()->symbols(),
                'confirmed'
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password, // Hash otomatis oleh $casts di Model
                'is_admin' => false,
            ]);

            Auth::login($user);

            // --- PERUBAHAN DI SINI ---
            // Redirect ke route 'welcome' setelah registrasi berhasil
            return redirect()->route('welcome')
                   ->with('success', 'Registrasi berhasil! Selamat datang.');

        } catch (\Exception $e) {
            // Log::error('Registrasi gagal: ' . $e->getMessage()); // Sebaiknya log error
            return redirect()->route('register')
                       ->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.')
                       ->withInput();
        }
    }

    // Method logout() tetap sama
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')
               ->with('success', 'Anda telah berhasil logout.');
    }
}
