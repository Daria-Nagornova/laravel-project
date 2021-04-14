<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feeding extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'child_id', 'time', 'products'];

    public function child() : belongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
