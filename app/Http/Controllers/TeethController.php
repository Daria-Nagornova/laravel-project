<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teeth\StoreRequest;
use App\Http\Resources\TeethResource;
use App\Models\Teeth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TeethController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $teeth = Teeth::paginate(10);

        return TeethResource::collection($teeth);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $teeth = new Teeth;
        $teeth->fill($request->validated());
        $teeth->save();

        return response()->json($teeth, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teeth  $teeth
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Teeth $teeth) : JsonResponse
    {
        $teeth->delete();

        return response()->json($teeth, 200);
    }
}
