<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'cId',
        'uId'
    ];
    protected $table='genre';

    public function books()
    {
        return $this->hasMany(Book::class, 'genre');
    }


    public function scopeSearch($query, $genre)
    {
        return $query->where('name', 'like', "%$genre%");
    }
}
