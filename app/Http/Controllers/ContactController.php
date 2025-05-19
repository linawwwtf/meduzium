<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function indexAdmin()
    {
        $contacts = Contact::all();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function createMainContactForm()
    {
        $data = request()->validate([
            'name' => 'required|min:9|max:255',
            'phone' => 'required',
            'message' => 'required|string'
        ]);

        Contact::create($data);

        return redirect()->back();
    }
}
