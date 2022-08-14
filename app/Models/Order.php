<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function getHotelInfo()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
    public function getUserInfo()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
