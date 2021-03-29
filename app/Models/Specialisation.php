<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialisation extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    public function doctors() : hasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
