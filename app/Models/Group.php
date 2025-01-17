<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    public function students():HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function adultStudents():HasMany
    {
        return $this->hasMany(Student::class)->where('age','>',17);
    }
}
