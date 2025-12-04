<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Admin listing of the resource (admin panel).
     */
    public function index()
    {
        // Untuk admin: tampilkan view admin (daftar about yang ada)
        // Ambil semua atau pertama sesuai kebutuhan admin
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Public facing about page.
     */
    public function indexPublic()
    {
        // Ambil satu konten about (misal pertama)
        $about = About::first();
        return view('about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource (admin).
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage (admin).
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

        // Ganti newline dengan <br>
        $description = str_replace("\n", '<br>', $request->description);

        About::create([
            'title' => $request->title,
            'description' => $description,
            'image_path' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.abouts.index')->with('success', 'About Us berhasil ditambahkan.');
    }

    /**
     * Display the specified resource (admin).
     */
    public function show(About $about)
    {
        return view('admin.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource (admin).
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage (admin).
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $about->image_path;

        if ($request->hasFile('image_path')) {
            // hapus file lama (disk public)
            if ($about->image_path && Storage::disk('public')->exists($about->image_path)) {
                Storage::disk('public')->delete($about->image_path);
            }
            $imagePath = $request->file('image_path')->store('about-images', 'public');
        }

        // Ganti newline dengan <br>
        $description = str_replace("\n", '<br>', $request->description);

        $about->update([
            'title' => $request->title,
            'description' => $description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.abouts.index')->with('success', 'About Us berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage (admin).
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
