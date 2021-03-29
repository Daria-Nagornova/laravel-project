<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'content', 'user_id', 'category_id', 'subcategory_id'];

    public function category() : belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() : belongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

}
