<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Category $category): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $posts = $category->posts()->paginate(6);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $post = new Post;
        $post->fill($request->validated());
        $post->save();

        if($request->hasFile('image')) {
            $image = Image::saveForPost($request->file('image'), $post);
            return response()->json($image, 201);
        }
        // redirect()->route('/communities')->with('success', 'Пост сохранен');
        return response()->json($post, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category, Post $post) : JsonResponse
    {
        $blog = $post->load('user', 'subcategory', 'category', 'comments', 'image');
        return response()->json($blog, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Category $category
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Category $category, Post $post) : JsonResponse
    {

        $post->update($request->validated());

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category, Post $post): JsonResponse
    {
        $post->delete();

        return response()->json($post, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function userPost(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $posts = $request->user();
dd($posts);
       // $posts = $request->user()->posts()->paginate(6);
        //return PostResource::collection($posts);
    }

}
