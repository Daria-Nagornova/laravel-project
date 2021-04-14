<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vaccination\StoreRequest;
use App\Http\Resources\VaccinationResource;
use App\Models\Vaccination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() : AnonymousResourceCollection
    {
        $vaccination = Vaccination::paginate(10);
        return VaccinationResource::collection($vaccination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(StoreRequest $request) : JsonResponse
    {
        $vaccination = new Vaccination;
        $vaccination->fill($request->validated());
        $vaccination->save();

        return response()->json($vaccination, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return JsonResponse
     */
    public function destroy(Vaccination $vaccination) : JsonResponse
    {
        $vaccination->delete();

        return response()->json($vaccination, 200);
    }
}
