<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentbook extends Model
{
    use HasFactory;

    protected $table = 'rentbook';
    protected $fillable = [
        'user_id',
        'book_id',
        'startingDate',
        'endingDate',
        'isDamaged',
        'delivery_id',
        'isLate',
        'status',
        'penaltyAmount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function delivery()
    {
        return $this->belongsTo(userDelivery::class,'delivery_id');
    }

    public function scopeSearch($query, $book)
    {
        return $query->with('user', 'book')
            ->where(function ($query) use ($book) {
                $query->where('status', 'like', "%$book%");
            })
            ->orWhereHas('user', function ($query) use ($book) {
                $query->where('name', 'like', "%$book%");
            })
            ->orWhereHas('book', function ($query) use ($book) {
                $query->where('title', 'like', "%$book%");
            });
    }
}
