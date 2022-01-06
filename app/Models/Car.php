<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    // Relaciones
    protected $fillable = [
        'user',
        'brand',
        'mob',
        'year',
        'company',
        'image',
    ];
    public function rides()
    {
        return $this->hasMany(Ride::class, 'id', 'car');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
