<?php

namespace App\Services\VisaInfo;

use App\Models\VisaInfo;

class VisaInfoService
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
        return VisaInfo::orderBy('id', 'desc')->get();
    }

    public function store(array $data): object
    {
        return VisaInfo::create($data);
    }

    public function update(array $data, VisaInfo $visa): bool
    {
        return $visa->update($data);
    }

    public function softDelete(VisaInfo $visa): bool
    {
        return $visa->delete();
    }
}
