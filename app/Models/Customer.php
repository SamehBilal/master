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

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'name'          => "nullable|max:40",
            'email'         => "nullable|email|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,$id|unique:users,email,$id",
            'password'      => 'nullable|confirmed',
            'phone'         => "nullable|numeric|digits_between:1,16",
            'other_phone'   => "nullable|numeric|digits_between:1,16",
            'gender'        => 'nullable',Rule::in(['male','female']),
            'religion'      => 'nullable',Rule::in(['Islam','Christianity']),
            'date_of_birth' => "nullable|date_format:Y-m-d|before:today",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'name'          => "required|max:40",
            'email'         => 'nullable|email|regex:/(.+)@(.+)\.(.+)/i|max:255|unique:users',
            'password'      => 'required|confirmed|min:8',
        ]);
    }
}
