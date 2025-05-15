<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller {
    public function index() {
        return view('admin.menus.index', ['menus' => Menu::all()]);
    }
}
