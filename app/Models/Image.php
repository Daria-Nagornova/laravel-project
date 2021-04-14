<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'size', 'post_id'];

    public static function saveForPost(UploadedFile $imageFile, Post $post) {

        $image = new Image;

        $categoryId = $post->category_id;

        $image->name = $imageFile->getClientOriginalName();
        $image->post_id = $post->id;
        $image->path = $imageFile->store("images/{$categoryId}", 'public');

        $image->save();

        return $image;
    }


    public function post() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
