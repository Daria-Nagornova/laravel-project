<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request) : JsonResponse
    {
        $category = new Category;
        $category->fill($request->validated());
        $category->image = $request->image->store("/images/categories", 'public');
        $category->save();

        return response()->json($category, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Category $category) : JsonResponse
    {
        $category->update($request->validated());

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) : JsonResponse
    {
        $category->delete();

        return response()->json($category, 200);
    }
    public function getSubcategory($category) : JsonResponse
    {
        $c = Subcategory::where('category_id', $category)->with(['posts' => function($query){
            $query->select('subcategory_id');
        }])->get();

        return response()->json($c, 200);
    }
}
