<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryID',
        'publisherID',
        'authorID',
        'booktitle',
        'type',
        'bookweight',
        'description',
        'bookimage',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }
    
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisherID');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'authorID');
    }


}
