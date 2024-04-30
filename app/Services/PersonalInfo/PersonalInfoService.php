<?php

namespace App\Services\PersonalInfo;

use App\Models\PersonalInfo;

class PersonalInfoService
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
        return PersonalInfo::orderBy('title', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return PersonalInfo::create($data);
    }

    public function update(array $data, Religion $religion): bool
    {
        return $religion->update($data);
    }

    public function softDelete(Religion $religion): bool
    {
        return $religion->delete();
    }
}
