<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feeding\StoreRequest;
use App\Http\Resources\FeedingResource;
use App\Models\Feeding;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FeedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $feeding = Feeding::paginate(10);
        return FeedingResource::collection($feeding);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request) : JsonResponse
    {
        $feeding = new Feeding;
        $feeding->fill($request->validated());
        $feeding->save();

        return response()->json($feeding, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feeding  $feeding
     * @return JsonResponse
     */
    public function destroy(Feeding $feeding) : JsonResponse
    {
        $feeding->delete();

        return response()->json($feeding, 200);
    }
}
