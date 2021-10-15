<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Zone extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function address()
    {
        return $this->belongsTo(address::class);
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
            'avatar'        => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
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
