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
            $categories = UserCategory::orderBy('updated_at','desc')
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
        $categories = UserCategory::where([['model','App\Models\Contact'],['status','active'],['business_user_id',auth()->user()->id]])->get();
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
        $request->request->add(['password' => 123456789]);
        $request->request->add(['password_confirmation' => 123456789]);
        $this->validate($request, Contact::rules());
        $this->validate($request, User::rules());
        $data                   = $request->all();
        $data['first_name']     = $request->contact_name;
        $data['last_name']      = '';
        $data['full_name']      = $request->contact_name;
        $data['email']          = $request->contact_email;
        $data['username']       = null;
        $data['password']       = Hash::make($request->password);
        $data['other_email']    = null;
        $data['date_of_birth']  = null;
        $data['phone']          = $request->contact_phone;
        $data['secondary_phone']= null;
        $data['other_phone']    = null;
        $data['religion']       = null;
        $data['gender']         = null;
        $data['bio']            = null;
        try {
            \DB::transaction(function () use($data, $request) {
                $userhelperController = new UserHelperController();
                $user = $userhelperController->createuser($data);

                Contact::create([
                    'contact_name'                  => $request->contact_name,
                    'contact_job_title'             => $request->contact_job_title,
                    'contact_email'                 => $request->contact_email,
                    'contact_phone'                 => $request->contact_phone,
                    'user_category_id'              => $request->user_category_id,
                    'business_user_id'              => auth()->user()->id,
                    'user_id'                       => $user->id,
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
        return view('users.contacts.edit',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $categories = UserCategory::where([['model','App\Models\Contact'],['status','active'],['business_user_id',auth()->user()->id]])->get();
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
        $this->validate($request, Contact::rules($update = true, $contact->id));
        $this->validate($request, User::rules($update = true, $contact->user_id));
        $data                   = $request->all();
        $data['first_name']     = $request->contact_name;
        $data['full_name']      = $request->contact_name;
        $data['email']          = $request->contact_email;
        $data['phone']          = $request->contact_phone;

        try {
            \DB::transaction(function () use($data, $request,$contact) {
                $userhelperController = new UserHelperController();
                $user = $userhelperController->updateuser($data,$contact->user_id);

                $contact->update([
                    'contact_name'                  => $request->contact_name,
                    'contact_job_title'             => $request->contact_job_title,
                    'contact_email'                 => $request->contact_email,
                    'contact_phone'                 => $request->contact_phone,
                    'user_category_id'              => $request->user_category_id,
                    'business_user_id'              => auth()->user()->id,
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
