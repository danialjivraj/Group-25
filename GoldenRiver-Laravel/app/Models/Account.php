<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    protected $table = 'account';

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'Email',
        'User_Password',
        'User_Name',
        'User_Status',
        'User_DOB',
        'User_Sex',
        'Phone_Number',
        'User_Surname',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'User_Password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}


