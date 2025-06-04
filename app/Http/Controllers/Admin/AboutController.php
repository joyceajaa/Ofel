<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function indexPublic()
    {
        $about = About::first();
        return view('about.index', compact('about'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image_path')) {
        $imagePath = $request->file('image_path')->store('about-images', 'public');
    }

    About::create([
        'title' => $request->title,
        'description' => $request->description,
        'image_path' => $imagePath, // <---- PASTIKAN INI DISIMPAN
        'user_id' => auth()->id(),   // Atau sesuai dengan kebutuhan Anda
    ]);

    return redirect()->route('admin.abouts.index')->with('success', 'About Us berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = $about->image_path;  // Gunakan path gambar yang sudah ada sebagai default

    if ($request->hasFile('image_path')) {
        // Hapus gambar lama jika ada
        if ($about->image_path) {
            Storage::delete('public/' . $about->image_path);
        }
        $imagePath = $request->file('image_path')->store('about-images', 'public');
    }

    $about->update([
        'title' => $request->title,
        'description' => $request->description,
        'image_path' => $imagePath,  // <---- PASTIKAN INI DISIMPAN
    ]);

    return redirect()->route('admin.abouts.index')->with('success', 'About Us berhasil diupdate.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        if ($about->image_path && Storage::disk('public')->exists($about->image_path)) {
            Storage::disk('public')->delete($about->image_path);
        }

        $about->delete();

        return redirect()->route('admin.abouts.index')
                         ->with('success', 'About Us deleted successfully.');
    }
}
