<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function indexPublic()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function showPublic($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.show', compact('menu'));
    }
}
