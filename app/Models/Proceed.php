<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceed extends Model
{
    use HasFactory;

    protected $fillable = [

        'userID',
        'basketID',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'postal',
        'date',
        'bookstatus'
    ];


}
