<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayahs = Wilayah::all();
        return view('admin.wilayah.index', compact('wilayahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Wilayah::create($request->all());

        return redirect()->route('admin.wilayahs.index')
                         ->with('success', 'Wilayah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wilayah $wilayah)
    {
        return view('admin.wilayah.show', compact('wilayah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilayah $wilayah)
    {
        return view('admin.wilayah.edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $wilayah->update($request->all());

        return redirect()->route('admin.wilayahs.index')
                         ->with('success', 'Wilayah berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();

        return redirect()->route('admin.wilayahs.index')
                         ->with('success', 'Wilayah berhasil dihapus.');
    }
}
