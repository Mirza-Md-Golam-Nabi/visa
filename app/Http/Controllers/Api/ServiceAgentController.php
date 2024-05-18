<?php

namespace App\Http\Controllers\Api;

use App\Models\ServiceAgent;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Agent\AgentService;
use App\Http\Requests\Agent\Service\StoreServiceAgentRequest;
use App\Http\Requests\Agent\Service\UpdateServiceAgentRequest;

class ServiceAgentController extends Controller
{
    protected $service_agent;

    public function __construct()
    {
        $this->service_agent = new AgentService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $service_agents = $this->service_agent->index();
        return formatResponse(0, 200, 'Success', $service_agents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceAgentRequest $request): JsonResponse
    {
        $service_agent = $this->service_agent->store($request->validated());
        return formatResponse(0, 200, 'Success', $service_agent);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceAgent $service_agent): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $service_agent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceAgentRequest $request, ServiceAgent $service_agent): JsonResponse
    {
        $this->service_agent->update($request->validated(), $service_agent);
        return formatResponse(0, 200, 'Success', $service_agent->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceAgent $service_agent): JsonResponse
    {
        $this->service_agent->softDelete($service_agent);
        return $this->index();
    }
}



