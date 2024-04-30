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

    public function store(array $data): object
    {
        return VisaInfo::create($data);
    }

    public function update(array $data, int $personal_id): object
    {
        return VisaInfo::updateOrCreate(['personal_info_id' => $personal_id], $data);
    }

    public function softDelete(int $personal_id): bool
    {
        $visa_info = VisaInfo::where('personal_info_id', $personal_id)->first();

        if ($visa_info) {
            return $visa_info->delete();
        }

        return false;
    }
}
