<?php

namespace App\Services\Agent;

use App\Models\Agent;

class AgentService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function index(): object
    {
        return Agent::orderBy('id', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return Agent::create($data);
    }

    public function update(array $data, Agent $service_agent): bool
    {
        return $service_agent->update($data);
    }

    public function softDelete(Agent $service_agent): bool
    {
        return $service_agent->delete();
    }
}
