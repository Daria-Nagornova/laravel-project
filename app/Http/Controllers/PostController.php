<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $category = 'pregnant';
    public function __construct()
    {
        $uri = explode('/api/communities/', $_SERVER['REQUEST_URI']);
        $uri = array_diff($uri, []);

        if(isset($uri[1]) && ! empty($uri[1])) {
            $this->category = ucfirst($uri[1]);
           // dd($this->category);
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {

        $posts = Post::with('user', 'category', 'subcategory')->paginate(10);
        //$posts = Post::with('category')->where('category.name', $this->category);
        return PostResource::collection($posts);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : JsonResponse
    {
        $post = new Post;
        $post->fill($request->validated());
        $post->save();

        return response()->json($post, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post) : JsonResponse
    {
        return response()->json($post, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Post $post) : JsonResponse
    {
        $post->update($request->validate());

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json($post, 200);
    }
}
