<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function UserCategory()
    {
        return $this->hasOne(UserCategory::class , "id" , "user_category_id");
    }

    public function Currency()
    {
        return $this->hasOne(Currency::class , "id" , "currency_id");
    }

    public function Contact()
    {
        return $this->hasMany(Contact::class);
    }

    public function Client()
    {
        return $this->hasMany(Client::class);
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }

    public function user()
    {
        return $this->hasOne(User::class  , "id" , "user_id");
    }

    public function business()
    {
        return $this->hasOne(User::class  , "id" , "business_user_id");
    }

    public function business_name()
    {
        return $this->hasOne(Business::class  , "customer_id" , "id");
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'status'        => 'nullable',Rule::in(['active','inactive']),
            'payment'       => 'nullable',Rule::in(['cash','visa']),
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            //
        ]);
    }
}
