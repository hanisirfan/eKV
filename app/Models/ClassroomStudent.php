<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomStudent extends Model
{
    use HasFactory;
    protected $table = 'classroom_students';
    protected $fillable = [
        'users_username',
        'classrooms_id'
    ];
    // Relationships
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}
