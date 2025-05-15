<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function about()
    {
        return view('admin.about.index'); // pastikan view-nya ada di resources/views/admin/about.blade.php
    }
}
