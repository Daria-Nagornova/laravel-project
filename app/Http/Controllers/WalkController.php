<?php

namespace App\Http\Controllers;

use App\Http\Requests\Walk\StoreRequest;
use App\Http\Resources\WalkResource;
use App\Models\Walk;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        $walk = Walk::paginate(10);

        return WalkResource::collection($walk);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request) : JsonResponse
    {
        $walk = new Walk;
        $walk->fill($request->validated());
        $walk->save();

        return response()->json($walk, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Walk  $walk
     * @return JsonResponse
     */
    public function destroy(Walk $walk) : JsonResponse
    {
        $walk->delete();

        return response()->json($walk, 200);
    }
}
