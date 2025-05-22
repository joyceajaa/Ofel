<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk menyimpan gambar

class MenuController extends Controller
{
    /**
     * Display a listing of the resource. (Admin)
     */
    public function index()
    {
        $menus = Menu::all(); // Atau paginate jika datanya banyak: Menu::paginate(10);
        return view('admin.menus.index', compact('menus')); // Buat view 'admin/menus/index.blade.php'
    }

    /**
     * Show the form for creating a new resource. (Admin)
     */
    public function create()
    {
        return view('admin.menus.create'); // Buat view 'admin/menus/create.blade.php'
    }

    /**
     * Store a newly created resource in storage. (Admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|in:BentoCake,Bouquet,CharacterCake,FlowerBouquet,FruitCake,FudyBrownies,KleponCake,PaintingCake,Pudding,RibbonCake,TierCake', // Validasi kategori
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images/menus'); // Simpan di storage/app/public/images/menus
            $data['image'] = str_replace('public/', '', $imagePath); // Simpan path relatif ke database
        }

        Menu::create($data);

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource. (Admin)
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu')); // Buat view 'admin/menus/show.blade.php'
    }

    /**
     * Show the form for editing the specified resource. (Admin)
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu')); // Buat view 'admin/menus/edit.blade.php'
    }

    /**
     * Update the specified resource in storage. (Admin)
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'category' => 'required|string|max:255|in:BentoCake,Bouquet,CharacterCake,FlowerBouquet,FruitCake,FudyBrownies,KleponCake,PaintingCake,Pudding,RibbonCake,TierCake', // Validasi kategori
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($menu->image) {
                Storage::delete('public/' . $menu->image);
            }
            $imagePath = $request->file('image')->store('public/images/menus');
            $data['image'] = str_replace('public/', '', $imagePath);
        }

        $menu->update($data);

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage. (Admin)
     */
    public function destroy(Menu $menu)
    {
        // Hapus gambar jika ada
        if ($menu->image) {
            Storage::delete('public/' . $menu->image);
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')
                         ->with('success', 'Menu berhasil dihapus.');
    }

    /**
     * Display the specified resource for public view.
     */
    public function showPublic(Menu $menu)
    {
        return view('menus.show_public', compact('menu')); // Buat view 'menus/show_public.blade.php'
    }

    /**
     * Display all resources for public view.
     */
    public function indexPublic()
    {
        $menus = Menu::all();
        // Ambil nilai-nilai unik dari kolom 'category'
        $categories = Menu::distinct('category')->pluck('category');
        return view('menu.index', compact('menus', 'categories'));
    }
}
