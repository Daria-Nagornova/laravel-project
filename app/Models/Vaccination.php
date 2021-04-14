<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'child_id', 'name', 'comment'];

    public function child() : belongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
