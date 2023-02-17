<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [

        'publisherID',
        'authorname',
        'authorimage'
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisherID');
    }

}
