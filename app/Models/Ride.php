<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'number',
        'session',
        'sector',
        'school',
        'car',
    ];
    // Relaciones
    public function students()
    {
        return $this->hasMany(Student::class, 'id', 'ride');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
    public function car()
    {
        return $this->belongsTo(Car::class, 'car', 'id');
    }
    public function school()
    {
        return $this->belongsTo(School::class, 'school', 'id');
    }
}
