<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'date_birth', 'gender', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedings()
    {
        return $this->hasMany(Feeding::class);
    }

    public function heighths()
    {
         return $this->hasMany(Heighth::class);
    }

    public function sleeps()
    {
        return $this->hasMany(Sleep::class);
    }
    public function teeths()
    {
        return $this->hasMany(Teeth::class);
    }
    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
    public function walks()
    {
        return $this->hasMany(Walk::class);
    }
}
