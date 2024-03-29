<?php

namespace App\Http\Controllers\ManageUsers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\UserHelperController;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $contacts = Contact::where('business_user_id',$user->id)
                ->orderBy('updated_at','desc')
                ->get();
            $categories = UserCategory::where([['model','App\Models\Contact'],['status','active'],['business_user_id',$user->id]])->get();
        }else{
            $contacts = Contact::orderBy('updated_at','desc')
                ->get();
            $categories = UserCategory::where([['model','App\Models\Contact'],['status','active']])->orderBy('updated_at','desc')
                ->get();
        }

        return view('users.contacts.index',compact('contacts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $categories = UserCategory::where([['model','App\Models\Contact'],['status','active'],['business_user_id',$user->id]])->get();
        }else{
            $categories = UserCategory::where([['model','App\Models\Contact'],['status','active']])->orderBy('updated_at','desc')
                ->get();
        }
        return view('users.contacts.create',compact('customers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $this->validate($request, Contact::rules());

        try {
            \DB::transaction(function () use($user,$request) {

                Contact::create([
                    'contact_name'                  => $request->contact_name,
                    'contact_job_title'             => $request->contact_job_title,
                    'contact_email'                 => $request->contact_email,
                    'contact_phone'                 => $request->contact_phone,
                    'user_category_id'              => $request->user_category_id,
                    'customer_id'                   => $user->customer ? $user->customer->id:null,
                    'business_user_id'              => $user->id,
                ]);
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

        return redirect()->route('dashboard.contacts.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $categories = UserCategory::where([['model','App\Models\Contact'],['status','active'],['business_user_id',$user->id]])->get();
        }else{
            $categories = UserCategory::where([['model','App\Models\Contact'],['status','active']])->orderBy('updated_at','desc')
                ->get();
        }
        return view('users.contacts.edit',compact('contact','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $user = User::find(auth()->user()->id);
        if($user->hasRole('customer'))
        {
            $categories = UserCategory::where([['model','App\Models\Contact'],['status','active'],['business_user_id',$user->id]])->get();
        }else{
            $categories = UserCategory::where([['model','App\Models\Contact'],['status','active']])->orderBy('updated_at','desc')
                ->get();
        }
        return view('users.contacts.edit',compact('contact','categories'));
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
        $user = User::find(auth()->user()->id);
        $this->validate($request, Contact::rules($update = true, $contact->id));

        try {
            \DB::transaction(function () use($user,$request,$contact) {

                $contact->update([
                    'contact_name'                  => $request->contact_name,
                    'contact_job_title'             => $request->contact_job_title,
                    'contact_email'                 => $request->contact_email,
                    'contact_phone'                 => $request->contact_phone,
                    'user_category_id'              => $request->user_category_id,
                    'customer_id'                   => $user->customer ? $user->customer->id:null,
                    'business_user_id'              => $user->id,
                ]);
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

        return redirect()->route('dashboard.contacts.index')->with('success','Data updated successfully');
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
        return redirect()->route('dashboard.contacts.index')->with('success','Data deleted successfully');
    }
}
