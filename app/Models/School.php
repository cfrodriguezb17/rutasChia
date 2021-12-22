<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    // Relaciones
    public function rides()
    {
        return $this->hasMany(Ride::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'id', 'school');
    }
}
