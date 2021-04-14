<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'post_id', 'user_id'];

    public static function saveComment(array $data, User $user)
    {

        $comment = new Comment;
        $comment->fill($data);
        $comment->user_id = $user->id;
        $comment->save();

        return $comment;
    }

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post() : belongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
