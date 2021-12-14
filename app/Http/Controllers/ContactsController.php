<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Default view

        // First we check if we have a search
        $search = $request->input('search');

        $contacts = Contacts::query()
                ->when($search, function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                    $query->orWhere('phone', 'like', "%{$search}%");
                })
                ->toBase()
                ->paginate(5)
                ->withQueryString();

        return Inertia::render('Contacts/Index', compact('contacts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create Contact
        return Inertia::render('Contacts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data Post

        // Validation
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);


        //Store the object
        $contact = new Contacts();
        $contact->name = $request->input('name');
        $contact->lastname = $request->input('lastname') ;
        $contact->phone = $request->input('phone');
        $contact->save();

        // redirect
        return redirect('/contacts')
            ->with('message', 'Contact added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete the current model

        $contact = Contacts::findOrFail($id);
        $contact->delete();

        if ($contact) {
            // return Redirect::route('posts.index')->with('message', 'Data Berhasil Dihapus!');
            return redirect('/contacts')
            ->with('message', 'The contact has been deleted');
        }
    }
}
