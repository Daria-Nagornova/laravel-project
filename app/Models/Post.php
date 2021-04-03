<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'content', 'user_id', 'category_id', 'subcategory_id'];

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category() : belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() : belongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function comments() : hasMany
    {
        return $this->hasMany(Comment::class);
    }

}
