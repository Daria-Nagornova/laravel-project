<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'text', 'consultation_id'];

    public function consultation() : belongsTo
    {
        return $this->belongsTo(Consultation::class);
    }
}
