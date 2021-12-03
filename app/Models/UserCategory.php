<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class UserCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->hasOne(User::class  , "id" , "business_user_id");
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'name'          => "required|max:40|unique:user_categories,name,$id",
            'status'        => 'nullable',Rule::in(['active','inactive']),
            'icon'          => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'name'          => "required|max:40|unique:user_categories",
        ]);
    }
}
