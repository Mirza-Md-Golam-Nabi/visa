<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Religion\StoreReligionRequest;
use App\Http\Requests\Religion\UpdateReligionRequest;
use App\Models\Religion;
use App\Services\Religion\ReligionService;
use Illuminate\Http\JsonResponse;

class ReligionController extends Controller
{
    protected $religion;

    public function __construct()
    {
        $this->religion = new ReligionService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $religions = $this->religion->index();
        return formatResponse(0, 200, 'Success', $religions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReligionRequest $request): JsonResponse
    {
        $religion = $this->religion->store($request->validated());
        return formatResponse(0, 200, 'Success', $religion);
    }

    /**
     * Display the specified resource.
     */
    public function show(Religion $religion): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $religion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReligionRequest $request, Religion $religion): JsonResponse
    {
        $this->religion->update($request->validated(), $religion);
        return formatResponse(0, 200, 'Success', $religion->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Religion $religion): JsonResponse
    {
        $this->religion->softDelete($religion);
        return $this->index();
    }
}
