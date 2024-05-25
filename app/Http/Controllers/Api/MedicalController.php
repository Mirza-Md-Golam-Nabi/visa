<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\StoreMedicalRequest;
use App\Http\Requests\Medical\UpdateMedicalRequest;
use App\Models\Medical;
use App\Services\Medical\MedicalService;
use Illuminate\Http\JsonResponse;

class MedicalController extends Controller
{
    protected $medical;

    public function __construct()
    {
        $this->medical = new MedicalService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $agents = $this->medical->index();
        return formatResponse(0, 200, 'Success', $agents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicalRequest $request): JsonResponse
    {
        $medical = $this->medical->store($request->validated());
        return formatResponse(0, 200, 'Successfully store.', $medical);
    }

    /**
     * Display the specified resource.
     */
    public function show(Medical $medical): JsonResponse
    {
        return formatResponse(0, 200, 'Successfully show', $medical);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicalRequest $request, Medical $medical): JsonResponse
    {
        $this->medical->update($request->validated(), $medical);
        return formatResponse(0, 200, 'Successfully update', $medical->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medical $medical): JsonResponse
    {
        $this->medical->softDelete($medical);
        return $this->index();
    }
}
