<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Child extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'date_birth', 'gender', 'user_id'];


    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function feedings() : hasMany
    {
        return $this->hasMany(Feeding::class);
    }

    public function heighths() : hasMany
    {
         return $this->hasMany(Heighth::class);
    }

    public function sleeps() : hasMany
    {
        return $this->hasMany(Sleep::class);
    }
    public function teeths() : hasMany
    {
        return $this->hasMany(Teeth::class);
    }
    public function vaccinations() : hasMany
    {
        return $this->hasMany(Vaccination::class);
    }
    public function walks() : hasMany
    {
        return $this->hasMany(Walk::class);
    }
}
