<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membership extends Model
{
    use HasFactory;
    protected $fillable = [
        "membershipLevel",
        "numberOfBooks",
        "price",
        "cId",
        "uId",
        "isDeleted",
        "created_at",
        "updated_at",
        'Extra',
    ];
    protected $table = "membershiptable";


    public function scopeSearch($query, $membership)
    {
        return $query->where('membershipLevel', 'like', "%$membership%");
    }
}
