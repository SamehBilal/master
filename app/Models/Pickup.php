<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'repeat_days' => 'array',
    ];

    public function contact()
    {
        return $this->hasOne(Contact::class  , "id" , "contact_id");
    }

    public function location()
    {
        return $this->hasOne(Location::class  , "id" , "location_id");
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'pickup_id'          => "required|max:40|unique:pickups,pickup_id,$id",
            'scheduled_date'     => "required",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'pickup_id'          => "required|max:40|unique:pickups",
        ]);
    }
}
