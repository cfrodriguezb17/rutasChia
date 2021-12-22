<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;
    // Relaciones
    public function students()
    {
        return $this->hasMany(Student::class, 'id', 'ride');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
