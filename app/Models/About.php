<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function rules($update = false, $id = null)
    {
        $common = [
            'en_mission'               => "required",
            'ar_mission'               => "required",
            'en_vision'                => "required",
            'ar_vision'                => "required",
            'en_footer_description'    => "required",
            'ar_footer_description'    => "required",
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            //
        ]);
    }
}
