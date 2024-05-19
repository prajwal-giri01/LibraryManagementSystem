<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userHasMembership extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'membership_id',
        'startingDate',
        'endingDate',
        'status',
        'qr'
    ];
    protected $table="user_has_membership";

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function membership(){
        return $this->belongsTo(membership::class, 'membership_id');
    }
}
