<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Walk extends Model
{
    use HasFactory;

    protected $fillable = ['child_id', 'start', 'end'];

    public function child() : belongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
