<?php

namespace App\Http\Controllers\ManageUsers;

use App\Http\Controllers\Helpers\UserHelperController;
use App\Models\Currency;
use App\Models\Customer;
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
        $customers = Customer::with('UserCategory')->paginate(20);
        $categories = UserCategory::all();
        return view('users.customers.index',compact('customers','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = UserCategory::all();
        $currencies = Currency::all();
        return view('users.customers.create',compact('currencies','categories'));
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

        $this->validate($request, User::rules());
        $this->validate($request, Customer::rules());

        $data = $request->all();

        $data['password']       = Hash::make($data['password']);
        $data['other_email']    = null;
        $data['other_phone']    = null;
        //create user
        try {
            \DB::transaction(function () use($data, $request) {
                $userhelperController = new UserHelperController();
                $user = $userhelperController->createuser($data);

                $customer = Customer::create([
                    'user_id'               => $user->id,
                    'name'                  => $request->name,
                    'email'                 => $request->email,
                    'phone'                 => $request->phone,
                    'other_phone'           => $request->other_phone,
                    'fax'                   => $request->fax,
                    'note'                  => $request->note,
                    'web_address'           => $request->web_address,
                    'status'                => $request->status,
                    'payment'               => $request->payment,
                    /*'user_category_id'      => $request->user_category_id,
                    'currency_id'           => $request->currency_id,
                    'student_code'          => $data['student_code'],
                    'student_national_id'   => $data['student_national_id'],
                    'join_year'             => $data['join_year'],
                    'citizenship'           => $data['citizenship'],
                    'home_phone'            => $data['home_phone'],
                    'f_email'               => $data['f_email'],
                    'f_phone'               => $data['f_phone'],
                    'f_academic_degree'     => $data['f_academic_degree'],
                    'f_occupation'          => $data['f_occupation'],
                    'f_national_id'         => $data['f_national_id'],
                    'm_email'               => $data['m_email'],
                    'm_phone'               => $data['m_phone'],
                    'm_academic_degree'     => $data['m_academic_degree'],
                    'm_occupation'          => $data['m_occupation'],
                    'm_national_id'         => $data['m_national_id'],
                    'stage_id'              => $data['stage_id'],
                    'class_id'              => $data['class_id'],
                    'bus_id'                => $data['bus_id'],
                    'emergancy_number'      => $data['emergancy_number'],
                    'father_id'             => $data['father_id'],
                    'account_id'            => 1,*/
                ]);
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
        return view('users.customers.edit',compact('customer','categories','currencies'));
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
                    /*'student_national_id'   => $data['student_national_id'],
                    'join_year'             => $data['join_year'],
                    'citizenship'           => $data['citizenship'],
                    'home_phone'            => $data['home_phone'],
                    'f_email'               => $data['f_email'],
                    'f_phone'               => $data['f_phone'],
                    'f_academic_degree'     => $data['f_academic_degree'],
                    'f_occupation'          => $data['f_occupation'],
                    'f_national_id'         => $data['f_national_id'],
                    'm_email'               => $data['m_email'],
                    'm_phone'               => $data['m_phone'],
                    'm_academic_degree'     => $data['m_academic_degree'],
                    'm_occupation'          => $data['m_occupation'],
                    'm_national_id'         => $data['m_national_id'],
                    'stage_id'              => $data['stage_id'],
                    'class_id'              => $data['class_id'],
                    'bus_id'                => $data['bus_id'],
                    'emergancy_number'      => $data['emergancy_number'],
                    'father_id'             => $data['father_id'],*/
                    'name'                  => $request->name,
                    'email'                 => $request->email,
                    'phone'                 => $request->phone,
                    'other_phone'           => $request->other_phone,
                    'fax'                   => $request->fax,
                    'note'                  => $request->note,
                    'web_address'           => $request->web_address,
                    'status'                => $request->status,
                    'payment'               => $request->payment,
                    'user_id'               => $request->user_id,
                    'user_category_id'      => $request->user_category_id,
                    'currency_id'           => $request->currency_id,
                ]);
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
