<?php

namespace App\Services\Medical;

use App\Models\Medical;

class MedicalService
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
        return Medical::with('passenger', 'medical_center')
            ->orderBy('id', 'asc')
            ->get();
    }

    public function store(array $data): object
    {
        return Medical::create($data);
    }

    public function update(array $data, Medical $medical): bool
    {
        return $medical->update($data);
    }

    public function softDelete(Medical $medical): bool
    {
        return $medical->delete();
    }
}
