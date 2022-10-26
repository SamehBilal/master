<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Customer()
    {
        return $this->hasOne(Customer::class, "id" , "customer_id");
    }

    public function UserCategory()
    {
        return $this->hasOne(UserCategory::class , "id" , "user_category_id");
    }

    public function business()
    {
        return $this->hasOne(User::class  , "id" , "business_user_id");
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'contact_name'          => "required|max:40",
            'contact_email'         => "nullable|email|regex:/(.+)@(.+)\.(.+)/i|unique:contacts,contact_email,$id",
            'contact_phone'         => "nullable|numeric|min:11",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'contact_email'         => 'nullable|email|regex:/(.+)@(.+)\.(.+)/i|max:255',
        ]);
    }
}
