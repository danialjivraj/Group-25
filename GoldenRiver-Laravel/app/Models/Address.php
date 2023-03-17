<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey = 'Address_ID';

    protected $table = 'address';
    use HasFactory;
    protected $fillable = [
        'Account_ID',
        'ZIP',
        'City',
        'Country',
        'Street',
        'County',
    ];
}
