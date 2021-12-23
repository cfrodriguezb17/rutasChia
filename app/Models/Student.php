<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    // Relaciones
    protected $fillable = [
        'user',
        'ride',
        'names',
        'surnames',
        'type_id',
        'dni',
        'gender',
        'birth_date',
        'school',
        'course',
        'grade',
        'session',
        'address',
        'image'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
    public function ride()
    {
        return $this->belongsTo(Ride::class, 'ride', 'id');
    }
    public function school()
    {
        return $this->belongsTo(School::class, 'school', 'id');
    }
}
