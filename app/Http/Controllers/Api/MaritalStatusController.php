<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaritalStatus\StoreMaritalStatusRequest;
use App\Http\Requests\MaritalStatus\UpdateMaritalStatusRequest;
use App\Models\MaritalStatus;
use App\Services\MaritalStatus\MaritalStatusService;
use Illuminate\Http\JsonResponse;

class MaritalStatusController extends Controller
{
    protected $marital_status;

    public function __construct()
    {
        $this->marital_status = new MaritalStatusService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $marital_status = $this->marital_status->index();
        return formatResponse(0, 200, 'Success', $marital_status);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaritalStatusRequest $request): JsonResponse
    {
        $marital_status = $this->marital_status->store($request->validated());
        return formatResponse(0, 200, 'Success', $marital_status);
    }

    /**
     * Display the specified resource.
     */
    public function show(MaritalStatus $marital_status): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $marital_status);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaritalStatusRequest $request, MaritalStatus $marital_status): JsonResponse
    {
        $this->marital_status->update($request->validated(), $marital_status);
        return formatResponse(0, 200, 'Success', $marital_status->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaritalStatus $marital_status): JsonResponse
    {
        $this->marital_status->softDelete($marital_status);
        return $this->index();
    }
}
