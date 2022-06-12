<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Pickup extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'repeat_days' => 'array',
    ];

    public function getStatusColorAttribute()
    {
        switch($this->attributes['status']){
            case 'Created':
                return "badge-primary";
            case 'Out for pickup':
                return "badge-warning";
            case 'Picked up':
                return "badge-success";
            default:
                return "badge-danger";
        }
    }

    public function contact()
    {
        return $this->hasOne(Contact::class  , "id" , "contact_id");
    }

    public function location()
    {
        return $this->hasOne(Location::class  , "id" , "location_id");
    }

    public function business()
    {
        return $this->hasOne(User::class  , "id" , "business_user_id");
    }

    public function log()
    {
        return $this->hasMany(PickupLog::class)->orderByDesc('created_at');
    }


    public function couriers()
    {
        return $this->hasMany(OrdersCouriers::class)->orderByDesc('updated_at');
    }

    public static function attrs()
    {
        return [
            'pickup_id'                  => "Pickup Number",
            'type'                       => 'Type',
            'scheduled_date'             => "Scheduled Date",
            'status'                     => 'Status',
            'repeat_days'                => "Repeat Days",
            'notes'                      => "Notes",
            'contact_id'                 => "Contact",
            'location_id'                => "Location",
            'business_user_id'           => "Business User",
        ];
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'pickup_id'                 => "required|max:40|unique:pickups,pickup_id,$id",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'pickup_id'                 => "required|max:40|unique:pickups",
            'type'                      => 'nullable',Rule::in(['One Time','Daily','Weekly']),
            'scheduled_date'            => "required",
            'status'                    => 'nullable',Rule::in(['Created','Out for pickup','Picked up']),
            'repeat_days'               => "nullable",
            'notes'                     => "nullable",
            'contact_id'                => "required",
            'location_id'               => "required",
            'business_user_id'          => "required",
        ]);
    }
}
