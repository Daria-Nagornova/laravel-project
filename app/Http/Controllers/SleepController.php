<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sleep\StoreRequest;
use App\Http\Resources\SleepResource;
use App\Models\Sleep;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SleepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        $sleep = Sleep::paginate(10);
        return SleepResource::collection($sleep);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request) : JsonResponse
    {
        $sleep = new Sleep;
        $sleep->fill($request->validated());
        $sleep->save();

        return response()->json($sleep, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sleep  $sleep
     * @return JsonResponse
     */
    public function destroy(Sleep $sleep) : JsonResponse
    {
        $sleep->delete();

        return response()->json($sleep, 200);
    }
}
