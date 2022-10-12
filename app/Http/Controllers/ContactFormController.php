<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\User;
use App\Notifications\NewBusiness;
use App\Notifications\NewContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactforms = ContactForm::all();
        return view('website.contact-forms.index',compact('contactforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ContactForm::rules());

        $contactForm = ContactForm::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'message'               => $request->message,
        ]);

        $users = User::whereHas("roles", function($q){ $q->where("name", "Super Admin")->orWhere("name", "admin"); })->get();
        Notification::send($users, new NewContactForm($contactForm));

        return redirect()->back()->with('success','Message Sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function show(ContactForm $contactForm)
    {
        return view('website.contact-forms.show',compact('contactForm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactForm $contactForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactForm $contactForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactForm $contactForm)
    {
        //
    }
}
