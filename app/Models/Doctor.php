<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function specialisation()
    {
        return $this->belongsTo(Specialisation::class);
    }
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

}
