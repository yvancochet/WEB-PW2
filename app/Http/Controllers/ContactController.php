<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        $contactsCount = Contact::count();

        return view('contacts.index', compact('contacts', 'contactsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate user input
        $request->validate([
            'name' => 'required|string|max:25',
            'surname' => 'required|string|max:25',
            'phone_number' => 'string|max:25|nullable',
            'email' => 'email|nullable',
            'address' => 'string|nullable',
            'picture' => 'image|mimes:jpeg,png,jpg|max:50|nullable',
            'birthday_date' => 'date|nullable',
            'note' => 'string|max:1024|nullable',
        ]);

        // Handle picture upload
        $picture = null;
        if ($request->hasFile('picture')) {
            $picture = base64_encode(file_get_contents($request->file('picture')->path()));
        }

        // Create contact
        Contact::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'picture' => $picture,
            'birthday_date' => $request->input('birthday_date'),
            'note' => $request->input('note'),
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //Validate user input
        $request->validate([
            'name' => 'required|string|max:25',
            'surname' => 'required|string|max:25',
            'phone_number' => 'string|max:25|nullable',
            'email' => 'email|nullable',
            'address' => 'string|nullable',
            'picture' => 'image|mimes:jpeg,png,jpg|max:50|nullable',
            'birthday_date' => 'date|nullable',
            'note' => 'string|max:1024|nullable',
        ]);

        // Handle picture upload
        if ($request->hasFile('picture')) {
            $picture = base64_encode(file_get_contents($request->file('picture')->path()));
        } else {
            $picture = $contact->picture; // Keep the existing picture if not updated
        }

        // Update contact data
        $contact->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'picture' => $picture,
            'birthday_date' => $request->input('birthday_date'),
            'note' => $request->input('note'),
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
