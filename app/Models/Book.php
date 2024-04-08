<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'author',
        'genre',
        'quantity',
        'cId',
        'uId'
    ];
    protected $table="book";

    public function authors()
    {
        return $this->belongsTo(Author::class, 'author');
    }

    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genre');
    }

}
