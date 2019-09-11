<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('pages.admin.contact.index')
            ->with([
                'contact' => $contact
            ]);
    }

    public function store(Request $request)
    {
        $store = Contact::updateOrCreate(
            ['id' => 1],
            [
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone
            ]
            );

        return $store ? redirect()->back()->with('success', 'Data Berhasil Tersimpan')
            : redirect()->back()->with('danger', 'Terjadi Kesalahan');
    }
}
