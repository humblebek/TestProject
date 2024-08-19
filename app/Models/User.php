<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'maiden_name',
        'age',
        'gender',
        'email',
        'phone',
        'username',
        'password',
        'birth_date',
        'image',
        'blood_group',
        'height',
        'weight',
        'eye_color',
        'hair_color',
        'hair_type',
        'ip',
        'mac_address',
        'university',
        'ein',
        'ssn',
        'user_agent',
        'role'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function bank()
    {
        return $this->hasOne(Bank::class);
    }



    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];
}
