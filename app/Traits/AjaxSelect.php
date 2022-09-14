<?php
namespace App\Traits;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;


trait AjaxSelect {
    public function get_state(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->get('id');
            $states = State::where('country_id',$id)->get();
            $html = '';
            foreach($states as $state){
                $html .= '<option value="'.$state->id.'">'.$state->name.'</option>';
            }
            $data = array(
                'html' => $html,
            );
            echo json_encode($data);
        }
    }

    public function get_city(Request $request)
    {
        if($request->ajax())
        {
            $id     = $request->get('id');
            $cities = City::where('state_id',$id)->get();
            $state  = State::find($id);
            $html   = '';
            foreach($cities as $city){
                $html .= '<option value="'.$city->id.'">'.$city->name.'</option>';
            }
            $data = array(
                'html' => $html,
                'state'=> $state->name,
            );

            echo json_encode($data);
        }
    }

    public function get_cityname(Request $request)
    {
        if($request->ajax())
        {
            $id     = $request->get('id');
            $city = City::find($id);

            $data = array(
                'city'=> $city->name,
            );

            echo json_encode($data);
        }
    }
}
