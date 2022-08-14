<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function hasHotels()
    {
        return $this->hasMany(Hotel::class, 'country_id', 'id');
    }
}
