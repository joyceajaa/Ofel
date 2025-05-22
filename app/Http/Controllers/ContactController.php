<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showPublic()
    {
        $contact = Contact::first();
        return view('contact.index', compact('contact'));
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'alamat' => 'nullable',
            'nomor_telepon' => 'nullable',
            'jadwal_toko' => 'nullable',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'email' => 'required|email',
            'alamat' => 'nullable',
            'nomor_telepon' => 'nullable',
            'jadwal_toko' => 'nullable',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
