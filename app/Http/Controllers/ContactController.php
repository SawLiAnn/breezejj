<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // $contacts = Contact::all();
        $contacts = Contact::where('tenant_id', auth()->user()->current_tenant_id)->get();
        // dd(Contact::where('tenant_id', auth()->user()->current_tenant_id)->get());
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email'
        ]);

        // $currentTenantID = auth()->user()->tenants()->first()->id;
        $currentTenantID = auth()->user()->current_tenant_id;

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'tenant_id' => $currentTenantID,
        ]);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact Created Successfully.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email'
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact Updated Successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact Deleted Successfully.');
    }
}
