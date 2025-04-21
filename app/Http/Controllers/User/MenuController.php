<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('user.menu.index', compact('menus'));
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('user.menu.show', compact('menu'));
    }
}
