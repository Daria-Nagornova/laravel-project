<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'specialisation_id', 'user_id', 'image'];

    public function specialisation() : belongsTo
    {
        return $this->belongsTo(Specialisation::class);
    }
    public function consultations() : hasMany
    {
        return $this->hasMany(Consultation::class);
    }

}
