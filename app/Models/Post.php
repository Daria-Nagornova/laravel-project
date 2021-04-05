<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'category_id', 'subcategory_id'];

    public function getShortContentAttribute(): string {
        return Str::limit($this->content, 150);
    }

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
    public function image() : belongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
