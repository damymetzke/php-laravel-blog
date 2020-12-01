<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    static public function createUser(string $name, string $email, string $password, $optional = [])
    {
        $data = array_merge(
            [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ],
            $optional
        );

        return User::create($data);
    }

    static public function validator($data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'unique:users', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['string', 'regex:/^(\+31|0)(6[\- ]?[0-589][0-9]{7}|[0-9]{2}[\- ]?[0-9]{7}|[0-9]{3}[\- ]?[0-9]{6})$/'], //only considers dutch phone numbers, is probably broken.
            'address' => ['string', 'max:255'],
            'bsn' => ['string', 'unique:users', 'regex:/^[0-9]{9}$/'],
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'bsn',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
