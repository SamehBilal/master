<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens,HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'email',
        'other_email',
        'password',
        'username',
        'provider',
        'provider_id',
        'gender',
        'religion',
        'date_of_birth',
        'avatar',
        'phone',
        'other_phone',
        'status',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function address()
    {
        return $this->hasMany(address::class);
    }

    public function getAvatarlinkAttribute()
    {
        return "/storage/users/{$this->id}/{$this->avatar}";
    }
    public static function rules($update = false, $id = null)
    {
        $common = [
            'first_name'    => "nullable|min:3|max:20",
            'last_name'     => "nullable|min:3|max:20",
            'full_name'     => "nullable|max:40",
            'email'         => "nullable|email|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,$id|unique:users,email,$id",
            'password'      => 'nullable|confirmed',
            'other_email'   => "nullable|email|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,$id|unique:users,other_email,$id",
            'phone'         => "nullable|numeric|digits_between:1,16",
            'other_phone'   => "nullable|numeric|digits_between:1,16",
            'gender'        => 'nullable',Rule::in(['Male','Female']),
            'religion'      => 'nullable',Rule::in(['Islam','Christianity']),
            'date_of_birth' => "nullable|date_format:Y-m-d|before:today",
            'avatar'        => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
        ];

        if ($update) {
            return $common;
        }

        return array_merge($common, [
            'first_name'    => "required|min:3|max:20",
            'last_name'     => "required|min:3|max:20",
            'full_name'     => "required|max:40",
            'email'         => 'nullable|email|regex:/(.+)@(.+)\.(.+)/i|max:255|unique:users',
            'password'      => 'required|confirmed|min:8',
        ]);
    }
}
