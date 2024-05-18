<?php

namespace App\Services\Agent;

use App\Models\ServiceAgent;

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
        return ServiceAgent::orderBy('id', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return ServiceAgent::create($data);
    }

    public function update(array $data, ServiceAgent $service_agent): bool
    {
        return $service_agent->update($data);
    }

    public function softDelete(ServiceAgent $service_agent): bool
    {
        return $service_agent->delete();
    }
}
