<?php

namespace App\Services\MaritalStatus;

use App\Models\MaritalStatus;

class MaritalStatusService
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
        return MaritalStatus::orderBy('title', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return MaritalStatus::create($data);
    }

    public function update(array $data, MaritalStatus $marital_status): bool
    {
        return $marital_status->update($data);
    }

    public function softDelete(MaritalStatus $marital_status): bool
    {
        return $marital_status->delete();
    }
}
