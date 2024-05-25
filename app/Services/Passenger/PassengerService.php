<?php

namespace App\Services\Passenger;

use App\Models\Passenger;

class PassengerService
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
        return Passenger::with(
            'passenger_agent',
            'service_agent',
            'division',
            'district',
            'passport',
            'passport.passport_issue'
        )
            ->orderBy('id', 'desc')
            ->get();
    }

    public function store(array $data): object
    {
        return Passenger::create($data);
    }

    public function update(array $data, Passenger $passenger): bool
    {
        return $passenger->update($data);
    }

    public function softDelete(Passenger $passenger): bool
    {
        return $passenger->delete();
    }
}
