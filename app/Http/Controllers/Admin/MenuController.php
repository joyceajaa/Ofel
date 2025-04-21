<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Controller;    
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller {
    public function index() {
        return view('admin.menu.index', ['menus' => Menu::all()]);
    }
}
