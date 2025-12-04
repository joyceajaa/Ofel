<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    // untuk admin
    public function index()
    {
        // return view('locations.index'); // sesuaikan view jika ada
        return abort(404, 'Admin Location index belum diisi.');
    }

    // untuk publik (jika Anda butuh)
    public function indexPublic()
    {
        // return view('locations.public_index');
        return abort(404, 'Public Location index belum diisi.');
    }
}
