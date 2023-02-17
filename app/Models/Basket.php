<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [

        'userID',
        'bookID',
        'quantity'
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'bookID');
    }

}
