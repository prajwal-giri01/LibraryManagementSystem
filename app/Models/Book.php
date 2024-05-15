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
        'uId',
        'Extra',
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
        return $this->hasOne(BookImage::class, 'book_id')->withDefault([
            'name' => 'no-image.jpg'
        ]);
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

    public function scopeFilter($query, $book)
    {
        return $query->where('title', 'like', "%$book%");
    }



}
