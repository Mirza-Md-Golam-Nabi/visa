<?php

namespace App\Services\Passport;

use App\Models\Passport;

class PassportService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data): object
    {
        return Passport::create($data);
    }

    public function update(array $data, int $passenger_id): object
    {
        return Passport::updateOrCreate(['passenger_id' => $passenger_id], $data);
    }

    public function softDelete(int $passenger_id): bool
    {
        $passport_info = Passport::where('passenger_id', $passenger_id)->first();

        if ($passport_info) {
            return $passport_info->delete();
        }

        return false;
    }
}
