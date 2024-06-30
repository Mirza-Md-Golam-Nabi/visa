<?php

namespace App\Services\PassengerVisa;

use App\Models\PassengerVisa;

class PassengerVisaService
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
        return PassengerVisa::with('passenger', 'visa_info')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function store(array $data): object
    {
        return PassengerVisa::create($data);
    }

    public function visaDetailsUpdate(array $data): mixed
    {
        $update = PassengerVisa::where('id', $data['id'])
            ->where('passenger_id', $data['passenger_id'])
            ->where('visa_info_id', $data['visa_info_id'])
            ->update($data);

        if ($update) {
            return PassengerVisa::find($data['id']);
        }

        return false;
    }

    public function update(array $data, int $passenger_id): object
    {
        return PassengerVisa::updateOrCreate(['passenger_id' => $passenger_id], $data);
    }

    public function softDelete(int $passenger_id): bool
    {
        $passenger_visa = PassengerVisa::where('passenger_id', $passenger_id)->first();

        if ($passenger_visa) {
            return $passenger_visa->delete();
        }

        return false;
    }
}
