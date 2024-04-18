<?php

namespace App\Services\Religion;

use App\Models\Religion;

class ReligionService
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
        return Religion::orderBy('title', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return Religion::create($data);
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
