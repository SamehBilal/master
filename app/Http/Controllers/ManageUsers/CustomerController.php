<?php

namespace App\Http\Controllers\ManageUsers;

use App\Http\Controllers\Helpers\UserHelperController;
use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\State;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::where('business_user_id',auth()->user()->id)
                                ->orderBy('updated_at','desc')
                                ->get();
        $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Customer']])
                                    ->orderBy('updated_at','desc')
                                    ->get();
        return view('users.customers.index',compact('customers','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = UserCategory::where('model','App\Models\Customer')->get();
        $currencies = Currency::all();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        return view('users.customers.create',compact('currencies','categories','countries','cities','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['password']              = '123456789';
        $request['password_confirmation'] = '123456789';
        $request['payment']               = 'cash';

        if($request->status == 'on')
        {
            $request['status']            = 'active';
        }else{
            $request['status']            = 'inactive';
        }

        $this->validate($request, User::rules());
        $this->validate($request, Customer::rules());

        $data                   = $request->all();
        $data['password']       = Hash::make($data['password']);
        $data['other_email']    = null;
        $data['other_phone']    = null;
        $data['religion']       = null;
        //create user
        try {
            \DB::transaction(function () use($data, $request) {
                $userhelperController = new UserHelperController();
                $user = $userhelperController->createuser($data);

                $customer = Customer::create([
                    'user_id'               => $user->id,
                    'fax'                   => $request->fax,
                    'status'                => $request->status,
                    'user_category_id'      => $request->user_category_id,
                    'currency_id'           => $request->currency_id,
                    'note'                  => $request->note,//
                    'payment'               => $request->payment,
                    /*'student_national_id'   => $data['student_national_id'],
                    'citizenship'           => $data['citizenship'],*/
                ]);

                for($i=0;$i < count($request->contact_name);$i++){
                    $customer->contact()->create([
                        'contact_name'          => $request->contact_name[$i],
                        'contact_job_title'     => $request->contact_job_title[$i],
                        'contact_email'         => $request->contact_email[$i],
                        'contact_phone'         => $request->contact_phone[$i],
                    ]);
                }

                for($j=0;$j < count($request->street);$j++){
                    $user->address()->create([
                        'street'                => $request->street[$j],
                        'building'              => $request->building[$j],
                        'floor'                 => $request->floor[$j],
                        'apartment'             => $request->apartment[$j],
                        'country_id'            => $request->country_id[$j],
                        'city_id'               => $request->city_id[$j],
                        /*'zone_id'               => $request->zone_id[$j],*/
                    ]);
                }

                /*if(request()->hasFile('document'))
                {
                    $document = request()->file('document')->getClientOriginalName();
                    request()->file('document')->storeAs('/', "/users/{$student->user_id}/{$document}", '');
                    $student->update(['document' =>  $document]);
                }*/
                $user->assignRole('customer');
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

        return redirect()->route('customers.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('users.customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $categories = UserCategory::all();
        $currencies = Currency::all();
        $states     = State::all();
        $cities     = City::all();
        $countries  = Country::all();
        return view('users.customers.edit',compact('customer','categories','currencies','cities','states','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $id = $customer->user_id;
        $this->validate($request, User::rules($update = true, $id));
        //$customer = Customer::where('user_id',$id)->first();
        $this->validate($request, Customer::rules($update = true, $customer->id));


        $data = $request->all();
        if ($data['password'] != null) {
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        $data['other_email']    = null;
        $data['other_phone']         = null;
        //update user data
        try {
            \DB::transaction(function () use($data, $request, $id) {
                $userhelperController = new UserHelperController();
                $user = $userhelperController->updateuser($data, $id);

                $customer = Customer::where('user_id',$id)->first();
                $customer->update([
                    'user_id'               => $user->id,
                    'fax'                   => $request->fax,
                    'status'                => $request->status,
                    'user_category_id'      => $request->user_category_id,
                    'currency_id'           => $request->currency_id,
                    'note'                  => $request->note,//
                    'payment'               => $request->payment,
                    /*'student_national_id'   => $data['student_national_id'],
                    'citizenship'           => $data['citizenship'],*/
                ]);

                for($i=0;$i < $request->contact_name;$i++){
                    $customer->contact()->update([
                        'contact_name'          => $request->contact_name[$i],
                        'contact_job_title'     => $request->contact_job_title[$i],
                        'contact_email'         => $request->contact_email[$i],
                        'contact_phone'         => $request->contact_phone[$i],
                    ]);
                }

                for($j=0;$j < $request->street;$j++){
                    $user->address()->update([
                        'street'                => $request->street[$j],
                        'building'              => $request->building[$j],
                        'floor'                 => $request->floor[$j],
                        'apartment'             => $request->apartment[$j],
                        'country_id'            => $request->country_id[$j],
                        'city_id'               => $request->city_id[$j],
                        'zone_id'               => $request->zone_id[$j],
                    ]);
                }

                /*if(request()->hasFile('document'))
                {
                    if(!empty($student->document))
                    {
                        $document = "/storage/users/{$student->user_id}/{$student->document}";
                        $path = str_replace('\\','/',public_path());

                        if(file_exists($path . $document))
                        {
                            unlink($path . $document);
                        }
                    }


                    $document = request()->file('document')->getClientOriginalName();
                    request()->file('document')->storeAs('/', "/users/{$student->user_id}/{$document}", '');
                    $student->update(['document' =>  $document]);

                }*/
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

        return redirect()->route('customers.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);
        return redirect()->route('customers.index')->with('success','Data deleted successfully');
    }
}
