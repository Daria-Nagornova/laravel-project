<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $comment = Comment::paginate(10);
        return response()->json($comment, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */

    public function store(StoreRequest $request): JsonResponse
    {
        $comment = Comment::saveComment($request->validated(), $request->user());

        return response()->json($comment, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */

    public function destroy(Comment $comment): JsonResponse
    {
        $comment->delete();

        return response()->json($comment, 200);
    }

    public function postComments(Post $post): JsonResponse
    {
        $count = $post->comments()->count();
        return response()->json($count, 200);
    }

    public function popular(): JsonResponse
    {
        $posts = Comment::with('post.image')->select('post_id')->selectRaw('count(*) as copies')->groupby('post_id')->orderbydesc('copies')->take(3)->get();

        return response()->json($posts, 200);
    }
}
