<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    use HasFactory;

    protected $fillable=[
        'book_id',
        'image',
    ];

    protected $table='bookimages';

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
