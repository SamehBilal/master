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
        $this->belongsTo(Customer::class);
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'name'          => "required|max:40",
            'email'         => "nullable|email|regex:/(.+)@(.+)\.(.+)/i,email,$id",
            'phone'         => "nullable|numeric|digits_between:1,16",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'name'          => "required|max:40",
            'email'         => 'nullable|email|regex:/(.+)@(.+)\.(.+)/i|max:255',
            'phone'         => "nullable|numeric|digits_between:1,16",
        ]);
    }
}
