<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    // Relaciones
    public function rides()
    {
        return $this->hasMany(Ride::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
