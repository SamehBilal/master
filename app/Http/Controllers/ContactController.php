<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('users.customers.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('users.customers.contacts.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Contact::rules());

        $contact = Contact::create([
            'contact_name'                  => $request->contact_name,
            'contact_job_title'             => $request->contact_job_title,
            'contact_email'                 => $request->contact_email,
            'contact_phone'                 => $request->contact_phone,
        ]);

        return redirect()->route('contacts.show',$contact->id)->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('users.customers.contacts.edit',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('users.customers.contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, Contact::rules($update = true, $contact->id));

        $contact->update([
            'contact_name'                  => $request->contact_name,
            'contact_job_title'             => $request->contact_job_title,
            'contact_email'                 => $request->contact_email,
            'contact_phone'                 => $request->contact_phone,
        ]);

        return redirect()->route('contacts.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->id);
        return redirect()->route('contacts.index')->with('success','Data deleted successfully');
    }
}
