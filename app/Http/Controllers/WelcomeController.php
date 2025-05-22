<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\About;
use App\Models\Location;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        // Jika user sudah login dan dia admin, redirect ke admin dashboard
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        $menus = Menu::all()->take(8); // Ambil 3 menu pertama
        $about = About::first(); // Ambil record "About Us" pertama
        $locations = Location::all()->take(2); // Ambil 2 lokasi pertama
        $feedbacks = Feedback::all()->take(3); // Ambil 3 feedback pertama

        return view('welcome', compact('menus', 'about', 'locations', 'feedbacks'));
    }
}
