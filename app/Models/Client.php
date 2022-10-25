<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Client extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function UserCategory()
    {
        return $this->hasOne(UserCategory::class , "id" , "user_category_id");
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }

    public function business()
    {
        return $this->hasOne(User::class  , "id" , "business_user_id");
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'first_name'    => "nullable|min:3|max:20",
            'last_name'     => "nullable|min:3|max:20",
            'full_name'     => "nullable|max:40",
            'email'         => "nullable|email|regex:/(.+)@(.+)\.(.+)/i|unique:clients,email,$id",
            'other_email'   => "nullable|email|regex:/(.+)@(.+)\.(.+)/i|unique:clients,other_email,$id",
            'phone'         => "nullable|numeric|min:11",
            'other_phone'   => "nullable|numeric|min:11",
            'avatar'        => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000',
            'status'        => 'nullable',Rule::in(['active','inactive']),
            'payment'       => 'nullable',Rule::in(['cash','visa']),
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'email'         => 'nullable|email|regex:/(.+)@(.+)\.(.+)/i|max:255|unique:clients',
        ]);
    }
}
