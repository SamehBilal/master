<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function rules($update = false, $id = null)
    {
        $common = [
            'name'          => "required|max:40",
            'email'         => "required",
            'message'       => "required",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'name'          => "required|max:40",
            'email'         => "required",
            'message'       => "required",
        ]);
    }
}
