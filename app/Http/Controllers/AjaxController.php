<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
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
            $id = $request->get('id');
            $client = Client::find($id);
            $name = $client->full_name;

            $data = array(
                'name' => $name,
            );

            return json_encode($data);
        }
    }

    public function location(Request $request)
    {
        if ($request->ajax()) {
            $id         = $request->get('id');
            $location   = Location::find($id);
            $state      = State::find($location->state_id);
            $city       = City::find($location->city_id);

            $data = array(
                'state'     => $state->name,
                'city'      => $city->name,
                'apartment' => $location->apartment,
                'floor'     => $location->floor,
                'building'  => $location->building,
                'street'    => $location->street,
            );

            return json_encode($data);
        }
    }
}
