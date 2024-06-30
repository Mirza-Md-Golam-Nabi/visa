<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\UpdateApplicationRequest;
use App\Http\Requests\PassengerVisa\StorePassengerVisaRequest;
use App\Models\Passenger;
use App\Models\PassengerVisa;
use App\Services\PassengerVisa\PassengerVisaService;
use Illuminate\Http\JsonResponse;

class PassengerVisaController extends Controller
{
    protected $passenger_visa;

    public function __construct()
    {
        $this->passenger_visa = new PassengerVisaService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $passenger_visas = $this->passenger_visa->index();
        return formatResponse(0, 200, 'Success', $passenger_visas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePassengerVisaRequest $request): JsonResponse
    {
        $passenger_visa = $this->passenger_visa->visaDetailsUpdate($request->validated());

        if ($passenger_visa) {
            return formatResponse(0, 200, 'Success', $passenger_visa);
        }

        return formatResponse(1, 400, 'Something wrong happened', null);
    }

    /**
     * Display the specified resource.
     */
    public function show(PassengerVisa $passenger_visa): JsonResponse
    {
        $passenger_visa->load('passenger',
            'visa_info',
        );

        return formatResponse(0, 200, 'Success', $passenger_visa);
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
