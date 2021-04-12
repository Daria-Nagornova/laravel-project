<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subcategory\StoreRequest;
use App\Models\Subcategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $subcategories = Subcategory::all();

        return response()->json($subcategories, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $subcategory = new Subcategory;
        $subcategory->fill($request->validated());
        $subcategory->save();

        return response()->json($subcategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return JsonResponse
     */
    public function destroy(Subcategory $subcategory): JsonResponse
    {
        $subcategory->delete();

        return response()->json($subcategory, 200);
    }
}
