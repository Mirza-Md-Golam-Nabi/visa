<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\Passenger\StorePassengerAgentRequest;
use App\Http\Requests\Agent\Passenger\UpdatePassengerAgentRequest;
use App\Models\PassengerAgent;
use App\Services\Agent\AgentPassenger;
use Illuminate\Http\JsonResponse;

class PassengerAgentController extends Controller
{
    protected $passenger_agent;

    public function __construct()
    {
        $this->passenger_agent = new AgentPassenger();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $passenger_agents = $this->passenger_agent->index();
        return formatResponse(0, 200, 'Success', $passenger_agents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePassengerAgentRequest $request): JsonResponse
    {
        $passenger_agent = $this->passenger_agent->store($request->validated());
        return formatResponse(0, 200, 'Success', $passenger_agent);
    }

    /**
     * Display the specified resource.
     */
    public function show(PassengerAgent $passenger_agent): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $passenger_agent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePassengerAgentRequest $request, PassengerAgent $passenger_agent): JsonResponse
    {
        $this->passenger_agent->update($request->validated(), $passenger_agent);
        return formatResponse(0, 200, 'Success', $passenger_agent->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PassengerAgent $passenger_agent): JsonResponse
    {
        $this->passenger_agent->softDelete($passenger_agent);
        return $this->index();
    }
}
