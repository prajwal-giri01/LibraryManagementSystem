<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'price',
        'isDeleted'
    ];
    protected $table='delivery';

    public function rentBook()
    {
        return $this->hasMany(Delivery::class,'delivery_id');
    }

    public function userDelivery()
    {
        return $this->hasMany(userDelivery::class,'delivery_id');
    }
    public function scopeSearch($query, $location)
    {
        return $query->where('address', 'like', "%$location%");
    }
}
