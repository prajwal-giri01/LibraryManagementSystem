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
    public function scopeSearch($query, $userhasMembership)
    {
        return $query->with(['user', 'membership'])
            ->where('status', 'like', "%$userhasMembership%")
            ->orWhereHas('user', function ($query) use ($userhasMembership) {
                $query->where('name', 'like', "%$userhasMembership%");
            })
            ->orWhereHas('membership', function ($query) use ($userhasMembership) {
                $query->where('membershipLevel', 'like', "%$userhasMembership%");
            });
    }


}
