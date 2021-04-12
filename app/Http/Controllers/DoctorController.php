<?php

namespace App\Http\Controllers;

use App\Http\Requests\Doctor\StoreRequest;
use App\Models\Doctor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $doctors = Doctor::all();

        return response()->json($doctors, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $doctor = new Doctor;
        $doctor->fill($request->validated());
        $doctor->image = $request->image->store("/images/doctors", 'public');
        $doctor->save();

        return response()->json($doctor, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return JsonResponse
     */
    public function destroy(Doctor $doctor): JsonResponse
    {
        $doctor->delete();

        return response()->json($doctor, 200);
    }

}
