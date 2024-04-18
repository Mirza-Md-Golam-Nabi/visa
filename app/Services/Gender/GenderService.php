<?php

namespace App\Services\Gender;

use App\Models\Gender;

class GenderService
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
        return Gender::orderBy('title', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return Gender::create($data);
    }

    public function update(array $data, Gender $gender): bool
    {
        return $gender->update($data);
    }

    public function softDelete(Gender $gender): bool
    {
        return $gender->delete();
    }
}
