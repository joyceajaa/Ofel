<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function indexPublic()
    {
        $locations = Location::all(); // Mengambil semua data lokasi
        return view('locations.index', compact('locations')); // Menampilkan view index dengan data locations
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all(); // Mengambil semua data lokasi
        return view('admin.locations.index', compact('locations')); // Menampilkan view index dengan data locations
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.locations.create'); // Menampilkan form untuk membuat lokasi baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string', // Bisa juga tambahkan validasi panjang karakter
        ]);

        Location::create($request->all());

        return redirect()->route('admin.locations.index')
                         ->with('success', 'Lokasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return view('admin.locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string', // Bisa juga tambahkan validasi panjang karakter
        ]);

        $location->update($request->all());

        return redirect()->route('admin.locations.index')
                         ->with('success', 'Lokasi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('admin.locations.index')
                         ->with('success', 'Lokasi berhasil dihapus.');
    }
}
