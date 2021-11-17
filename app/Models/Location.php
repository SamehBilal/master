<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Location extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function state()
    {
        return $this->hasOne(State::class  , "id" , "state_id");
    }

    public function city()
    {
        return $this->hasOne(City::class  , "id" , "city_id");
    }

    public function country()
    {
        return $this->hasOne(Country::class  , "id" , "country_id");
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'name'          => "nullable|max:40",
            
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'name'          => "required|max:40",
           
        ]);
    }
}
