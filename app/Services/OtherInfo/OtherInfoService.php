<?php

namespace App\Services\OtherInfo;

use App\Models\OtherInfo;

class OtherInfoService
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
        return OtherInfo::create($data);
    }

    public function update(array $data, int $personal_id): object
    {
        return OtherInfo::updateOrCreate(['personal_info_id' => $personal_id], $data);
    }

    public function softDelete(int $personal_id): bool
    {
        $other_info = OtherInfo::where('personal_info_id', $personal_id)->first();

        if ($other_info) {
            return $other_info->delete();
        }

        return false;
    }
}
