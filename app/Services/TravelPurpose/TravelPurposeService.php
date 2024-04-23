<?php

namespace App\Services\TravelPurpose;

use App\Models\TravelPurpose;

class TravelPurposeService
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
        return TravelPurpose::orderBy('title', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return TravelPurpose::create($data);
    }

    public function update(array $data, TravelPurpose $travel_purpose): bool
    {
        return $travel_purpose->update($data);
    }

    public function softDelete(TravelPurpose $travel_purpose): bool
    {
        return $travel_purpose->delete();
    }
}
