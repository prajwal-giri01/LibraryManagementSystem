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

    public function image(){
        return $this->hasOne(BookImage::class, 'book_id');
    }
    public function scopeSearch($query, $search)
    {
        return $query->with('genres', 'authors')
            ->where('isDeleted', 0)
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%");
            })
            ->orWhereHas('authors', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhereHas('genres', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            });
    }


}
