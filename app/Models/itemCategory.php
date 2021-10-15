<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class itemCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public static function rules($update = false, $id = null)
    {
        $common = [
            'name'          => "required|max:40|unique:item_categories,name,$id",
            'status'        => 'nullable',Rule::in(['active','inactive']),
            'icon'          => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'name'          => "required|max:40|unique:item_categories",
            'status'        => 'nullable',Rule::in(['active','inactive']),
            'icon'          => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
    }
}
