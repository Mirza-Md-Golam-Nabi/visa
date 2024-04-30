<?php

namespace App\Services\PassportInfo;

use App\Models\PassportInfo;

class PassportInfoService
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
        return PassportInfo::create($data);
    }

    public function update(array $data, int $personal_id): object
    {
        return PassportInfo::updateOrCreate(['personal_info_id' => $personal_id], $data);
    }

    public function softDelete(int $personal_id): bool
    {
        $passport_info = PassportInfo::where('personal_info_id', $personal_id)->first();

        if ($passport_info) {
            return $passport_info->delete();
        }

        return false;
    }
}
