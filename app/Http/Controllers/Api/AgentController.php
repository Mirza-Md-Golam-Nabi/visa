<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\StoreAgentRequest;
use App\Http\Requests\Agent\UpdateAgentRequest;
use App\Models\Agent;
use App\Services\Agent\AgentService;
use Illuminate\Http\JsonResponse;

class AgentController extends Controller
{
    protected $agent;

    public function __construct()
    {
        $this->agent = new AgentService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $agents = $this->agent->index();
        return formatResponse(0, 200, 'Success', $agents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgentRequest $request): JsonResponse
    {
        $agent = $this->agent->store($request->validated());
        return formatResponse(0, 200, 'Success', $agent);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent): JsonResponse
    {
        $agent->load('division', 'district');
        return formatResponse(0, 200, 'Success', $agent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgentRequest $request, Agent $agent): JsonResponse
    {
        $this->agent->update($request->validated(), $agent);
        return formatResponse(0, 200, 'Success', $agent->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent): JsonResponse
    {
        $this->agent->softDelete($agent);
        return $this->index();
    }
}
