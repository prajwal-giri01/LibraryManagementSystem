<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable=[
      'name',
      'cId',
      'uId'
    ];
    protected $table='author';

    public function books()
    {
        return $this->hasMany(Book::class);

    }
    public function scopeSearch($query, $author)
    {
        return $query->where('name', 'like', "%$author%");
    }




}


