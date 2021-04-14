<?php

namespace App\Http\Controllers;

use App\Http\Requests\Height\StoreRequest;
use App\Http\Resources\HeightResource;
use App\Models\Heighth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HeighthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $height = Heighth::paginate(10);
        return HeightResource::collection($height);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $height = new Heighth;
        $height->fill($request->validated());
        $height->save();

        return response()->json($height, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Heighth  $heighth
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Heighth $heighth): JsonResponse
    {
        $heighth->delete();

        return response()->json($heighth, 200);
    }
}
