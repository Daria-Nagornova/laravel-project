<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Consultation extends Model
{
    use HasFactory;

    const HELD = 'Проведена';
    const NO_HELD = 'Не проведена';

    protected $fillable = ['id', 'text', 'user_id', 'doctor_id'];

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function doctor() : belongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function answer() : hasOne
    {
        return $this->hasOne(Answer::class);
    }
}
