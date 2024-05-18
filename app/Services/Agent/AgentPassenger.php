<?php

namespace App\Services\Agent;

use App\Models\PassengerAgent;

class AgentPassenger
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
        return PassengerAgent::orderBy('id', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return PassengerAgent::create($data);
    }

    public function update(array $data, PassengerAgent $passenger_agent): bool
    {
        return $passenger_agent->update($data);
    }

    public function softDelete(PassengerAgent $passenger_agent): bool
    {
        return $passenger_agent->delete();
    }
}
