<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Policies\Ability;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request) : JsonResponse
    {
       $post = Post::savePost($request->validated(), $request->user());

        if ($request->hasFile('image')) {
            $image = Image::saveForPost($request->file('image'), $post);
            return response()->json($image, 201);
        }

        return response()->json($post, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category, Post $post): JsonResponse
    {
        //$this->authorize(Ability::VIEW, $post);

        $blog = $post->load('user', 'subcategory', 'category', 'comments.user', 'image');

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
    public function update(UpdateRequest $request, Category $category, Post $post): JsonResponse
    {
        /*if (! Gate::allows('update-post', $post)) {
            abort(403);
        }*/
        //$this->authorize(Ability::UPDATE, $post);

        $post->update($request->validated());

        if ($request->hasFile('image')) {
            $image = Image::saveForPost($request->file('image'), $post);
            return response()->json($image, 201);
        }

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
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
     * @return JsonResponse
     */
    public function userPost(Request $request): JsonResponse
    {
        $user = $request->user();
        $posts = $user->load('posts.image');

        return response()->json($posts, 200);

    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function postForHome(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {

        $posts = Post::orderByDesc('created_at')->take(3)->get();

        return PostResource::collection($posts);
    }

}

