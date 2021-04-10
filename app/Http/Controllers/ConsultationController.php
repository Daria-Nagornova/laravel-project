<?php

namespace App\Http\Controllers;

use App\Http\Requests\Consultation\StoreRequest;
use App\Http\Requests\Consultation\UpdateRequest;
use App\Http\Resources\ConsultationResource;
use App\Models\Consultation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $consultation = Consultation::where('status', Consultation::DONE)->with('answer', 'doctor')->paginate(10);
        return ConsultationResource::collection($consultation);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $consultation = Consultation::saveConsultation($request->validated(), $request->user());

        return response()->json($consultation, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return JsonResponse
     */
    public function show(Consultation $consultation) : JsonResponse
    {
        return response()->json($consultation, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Consultation $consultation
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Consultation $consultation): JsonResponse
    {
        $consultation->update($request->validated());

        return response()->json($consultation, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return JsonResponse
     */
    public function destroy(Consultation $consultation) : JsonResponse
    {
        $consultation->delete();

        return response()->json($consultation, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function userConsultation(Request $request): JsonResponse
    {
        $user = $request->user();
        $consultations = $user->load('consultations.answer');

        return response()->json($consultations, 200);

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function doctorConsultation(Request $request): JsonResponse
    {
        $user = $request->user();
        $consultations = $user->load('doctor.consultations.answer');

        return response()->json($consultations, 200);

    }
}
