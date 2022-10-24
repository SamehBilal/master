<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\UserHelperController;
use App\Models\City;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Location;
use App\Models\State;
use App\Models\User;
use App\Models\UserCategory;

class ClientController extends Controller
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
            $clients    = Client::where('business_user_id',auth()->user()->id)
                ->orderBy('updated_at','desc')
                ->get();
            $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Client'],['status','active']])
                ->orderBy('updated_at','desc')
                ->get();
        }else{
            $clients    = Client::orderBy('updated_at','desc')
                ->get();
            $categories = UserCategory::orderBy('updated_at','desc')
                ->get();
        }

        return view('users.clients.index',compact('clients','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Client'],['status','active']])->get();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        return view('users.clients.create',compact('categories','countries','cities','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $request->request->add(['payment' => 'cash']);
        $this->validate($request, Client::rules());
        $data                   = $request->all();
        $data['other_email']    = null;

        if($request->status == 'on')
        {
            $request['status']            = 'active';
        }else{
            $request['status']            = 'inactive';
        }
        try {
            \DB::transaction(function () use($data, $request) {
                $userhelperController = new UserHelperController();
                $user = $userhelperController->createuser($data);

                $client = Client::create([
                    'first_name'                => $request->first_name,
                    'last_name'                 => $request->last_name,
                    'full_name'                 => $request->full_name,
                    'email'                     => $request->email,
                    'other_email'               => $request->other_email,
                    'phone'                     => $request->phone,
                    'other_phone'               => $request->other_phone,
                    'status'                    => $request->status,
                    'user_category_id'          => $request->user_category_id,
                    'currency_id'               => $request->currency_id,
                    'note'                      => $request->note,
                    'payment'                   => $request->payment,
                    'business_user_id'          => auth()->user()->id,
                ]);

                if($request->contact_name){
                    for($i=0;$i < count($request->contact_name);$i++){
                        $client->contact()->create([
                            'contact_name'          => $request->contact_name[$i],
                            'contact_job_title'     => $request->contact_job_title[$i],
                            'contact_email'         => $request->contact_email[$i],
                            'contact_phone'         => $request->contact_phone[$i],
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }
                }

                if($request->street){
                    for($j=0;$j < count($request->street);$j++){
                        $client->location()->create([
                            'name'                  => $request->location_name[$j],
                            'street'                => $request->street[$j],
                            'building'              => $request->building[$j],
                            'floor'                 => $request->floor[$j],
                            'apartment'             => $request->apartment[$j],
                            'landmarks'             => $request->landmarks[$j],
                            'country_id'            => $request->country_id[$j],
                            'state_id'              => $request->state_id[$j],
                            'city_id'               => $request->city_id[$j],
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }
                }

                if(request()->hasFile('avatar'))
                {
                    $avatar = request()->file('avatar')->getClientOriginalName();
                    request()->file('avatar')->storeAs('/', "/users/{$user->id}/{$avatar}", '');
                    $user->update(['avatar' =>  $avatar]);
                }
                $user->assignRole('client');
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

        return redirect()->route('dashboard.clients.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Client'],['status','active']])->get();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        return view('users.clients.show',compact('client','categories','cities','states','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $categories = UserCategory::where([['business_user_id',auth()->user()->id],['model','App\Models\Client'],['status','active']])->get();
        $states     = State::where('country_id',64)->get();
        $cities     = City::all();
        $countries  = Country::all();
        $locations  = Location::where('client_id',$client->id)->get();
        return view('users.clients.edit',compact('client','categories','cities','states','countries','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $this->validate($request, Client::rules($update = true, $client->id));
        $data                   = $request->all();
        try {
            \DB::transaction(function () use($data, $request, $client) {

                $client->update([
                    'fax'                       => $request->fax,
                    'status'                    => $request->status,
                    'user_category_id'          => $request->user_category_id,
                    'note'                      => $request->note,
                    'payment'                   => $request->payment,
                    'business_user_id'          => auth()->user()->id,
                ]);

                if($request->contact_name){
                    for($i=0;$i < $request->contact_name;$i++){
                        $client->contact()->update([
                            'contact_name'          => $request->contact_name[$i],
                            'contact_job_title'     => $request->contact_job_title[$i],
                            'contact_email'         => $request->contact_email[$i],
                            'contact_phone'         => $request->contact_phone[$i],
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }
                }

                if($request->street)
                {
                    for($j=0;$j < $request->street;$j++){
                        $client->location()->update([
                            'name'                  => $request->location_name[$j],
                            'street'                => $request->street[$j],
                            'building'              => $request->building[$j],
                            'floor'                 => $request->floor[$j],
                            'apartment'             => $request->apartment[$j],
                            'landmarks'             => $request->landmarks[$j],
                            'country_id'            => $request->country_id[$j],
                            'state_id'              => $request->state_id[$j],
                            'city_id'               => $request->city_id[$j],
                            'business_user_id'      => auth()->user()->id,
                        ]);
                    }
                }


                if(request()->hasFile('avatar'))
                {
                    if(!empty($user->avatar))
                    {
                        $avatar = "/storage/users/{$user->id}/{$user->avatar}";
                        $path = str_replace('\\','/',public_path());

                        if(file_exists($path . $avatar))
                        {
                            unlink($path . $avatar);
                        }
                    }

                    $avatar = request()->file('avatar')->getClientOriginalName();
                    request()->file('avatar')->storeAs('/', "/users/{$user->id}/{$avatar}", '');
                    $user->update(['avatar' =>  $avatar]);

                }
            });
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }

        return redirect()->route('dashboard.clients.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        Client::destroy($client->id);
        return redirect()->route('dashboard.clients.index')->with('success','Data deleted successfully');
    }
}
