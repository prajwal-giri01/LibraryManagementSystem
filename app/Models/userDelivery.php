<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userDelivery extends Model
{
    use HasFactory;
    protected $fillable=[
      'user_id',
      'delivery_id',
    ];

    protected $table='user_delivery';

    public function deliveryAddress()
    {
        return $this->belongsTo(Delivery::class,'delivery_id');
    }
}
