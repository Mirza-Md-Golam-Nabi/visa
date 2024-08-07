<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\StoreApplicationRequest;
use App\Http\Requests\Application\UpdateApplicationRequest;
use App\Models\Passenger;
use App\Services\Application\ApplicationService;
use Illuminate\Http\JsonResponse;

class ApplicationController extends Controller
{
    protected $application;

    public function __construct()
    {
        $this->application = new ApplicationService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $applications = $this->application->index();
        return formatResponse(0, 200, 'Success', $applications);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request): JsonResponse
    {
        $application = $this->application->store($request->validated());

        if ($application) {
            return formatResponse(0, 200, 'Success', $application);
        }

        return formatResponse(1, 400, 'Something wrong happened', null);
    }

    /**
     * Display the specified resource.
     */
    public function show(Passenger $application): JsonResponse
    {
        $application->load('passenger_agent',
            'service_agent',
            'division',
            'district',
            'passport',
            'passport.passport_issue',
            'visa'
        );

        return formatResponse(0, 200, 'Success', $application);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Passenger $application): JsonResponse
    {
        $update = $this->application->update($request->validated(), $application);
        return formatResponse(0, 200, 'Success', $update);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passenger $application): JsonResponse
    {
        $this->application->softDelete($application);
        return $this->index();
    }
}
