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
            'contact_name'          => "required|max:40",
            'contact_email'         => "nullable|email|regex:/(.+)@(.+)\.(.+)/i,contact_email,$id",
            'contact_phone'         => "nullable|numeric|digits_between:1,16",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'contact_name'          => "required|max:40",
            'contact_email'         => 'nullable|email|regex:/(.+)@(.+)\.(.+)/i|max:255',
            'contact_phone'         => "nullable|numeric|digits_between:1,16",
        ]);
    }
}
