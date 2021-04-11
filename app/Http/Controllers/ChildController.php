<?php

namespace App\Http\Controllers;

use App\Http\Requests\Child\StoreRequest;
use App\Http\Requests\Child\UpdateRequest;
use App\Http\Resources\ChildResource;
use App\Models\Child;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $children = Child::paginate(10);

        return ChildResource::collection($children);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $child = new Child;
        $child->fill($request->validated());
        $user = $request->user();
        $child->user_id = $user->id;
        $child->save();

        return response()->json($child, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Child $child
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Child $child): JsonResponse
    {
        return response()->json($child, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param \App\Models\Child $child
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Child $child): JsonResponse
    {
        $child->update($request->validated());

        return response()->json($child, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Child $child
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Child $child): JsonResponse
    {
        $child->delete();

        return response()->json($child, 200);
    }

    /**
     * User child
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChild(Request $request): JsonResponse
    {
        $user = $request->user();
        $child = $user->load('children');


        return response()->json($child, 200);
    }

    /**
     * Child notes
     *
     * @param Child $child
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotes(Child $child): JsonResponse
    {

        $notes = $child->load('walks', 'feedings', 'sleeps', 'teeths', 'vaccinations', 'heighths');

        return response()->json($notes, 200);
    }
}
