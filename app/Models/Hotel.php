<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public function getCountryInfo()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function hasOrders()
    {
        return $this->hasMany(Order::class, 'hotel_id', 'id');
    }
}
