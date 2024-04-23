<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelPurpose\StoreTravelPurposeRequest;
use App\Http\Requests\TravelPurpose\UpdateTravelPurposeRequest;
use App\Models\TravelPurpose;
use App\Services\TravelPurpose\TravelPurposeService;
use Illuminate\Http\JsonResponse;

class TravelPurposeController extends Controller
{
    protected $travel_purpose;

    public function __construct()
    {
        $this->travel_purpose = new TravelPurposeService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $travel_purposes = $this->travel_purpose->index();
        return formatResponse(0, 200, 'Success', $travel_purposes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelPurposeRequest $request): JsonResponse
    {
        $travel_purpose = $this->travel_purpose->store($request->validated());
        return formatResponse(0, 200, 'Success', $travel_purpose);
    }

    /**
     * Display the specified resource.
     */
    public function show(TravelPurpose $travel_purpose): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $travel_purpose);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelPurposeRequest $request, TravelPurpose $travel_purpose): JsonResponse
    {
        $this->travel_purpose->update($request->validated(), $travel_purpose);
        return formatResponse(0, 200, 'Success', $travel_purpose->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelPurpose $travel_purpose): JsonResponse
    {
        $this->travel_purpose->softDelete($travel_purpose);
        return $this->index();
    }
}
