<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sleep extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'child_id', 'start', 'end', 'comment'];

    public function child() : belongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
