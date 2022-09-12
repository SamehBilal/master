<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use App\Models\Location;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function customer(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('customer');
            $customer = Customer::find($id);
            $name = $customer->user->full_name;

            $data = array(
                'name' => $name,
            );

            return json_encode($data);
        }
    }

    public function city(Request $request)
    {
        if ($request->ajax()) {
            $state = $request->get('state');
            $city = $request->get('city');
            $city_name = City::find($city);
            $state_name = State::find($state);
            $name_city = $city_name->name;
            $name_state = $state_name->name;

            $data = array(
                'city' => $name_city,
                'state' => $name_state,
            );

            return json_encode($data);
        }
    }

    public function location(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('location');
            $location = Location::find($id);
            $state = State::find($id);
            $city = City::find($id);

            $data = array(
                'state' => $state->name,
                'city' => $city->name,
                'apartment' => $location->apartment,
                'floor' => $location->floor,
                'building' => $location->building,
                'street' => $location->street,
            );

            return json_encode($data);
        }
    }
}
