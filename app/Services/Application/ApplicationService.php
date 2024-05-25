<?php

namespace App\Services\Application;

use App\Models\PersonalInfo;
use App\Services\LegalDocument\LegalDocumentService;
use App\Services\OtherInfo\OtherInfoService;
use App\Services\Passenger\PassengerService;
use App\Services\PassportInfo\PassportInfoService;
use App\Services\PersonalInfo\PersonalInfoService;
use App\Services\VisaInfo\VisaInfoService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApplicationService
{
    protected $passenger_service;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->passenger_service = new PassengerService;
    }

    public function index(): object
    {
        return $this->passenger_service->index();
    }

    public function store(array $data): mixed
    {
        try {
            DB::beginTransaction();

            $personal = (new PersonalInfoService())->store($data);
            $personal_id = ['personal_info_id' => $personal->id];
            $passport = (new PassportInfoService())->store($data + $personal_id);
            $visa = (new VisaInfoService())->store($data + $personal_id);
            $legal_document = (new LegalDocumentService())->store($data + $personal_id);
            $other_info = (new OtherInfoService())->store($data + $personal_id);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            $description = 'Application Store. user_id: ' . auth()->id();
            $error_msg = $e->getMessage();
            Log::channel('admin')->error($description . '. ' . $error_msg);

            return false;
        }

        return [
            'personal' => $personal,
            'passport' => $passport,
            'visa' => $visa,
            'legal_document' => $legal_document,
            'other_info' => $other_info,
        ];
    }

    public function update(array $data, PersonalInfo $personal): array
    {
        try {
            DB::beginTransaction();

            $personal_id = $personal->id;
            $personal->update($data);
            $passport = (new PassportInfoService())->update($data, $personal_id);
            $visa = (new VisaInfoService())->update($data, $personal_id);
            $legal_document = (new LegalDocumentService())->update($data, $personal_id);
            $other_info = (new OtherInfoService())->update($data, $personal_id);

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();

            $description = 'Application Update. user_id: ' . auth()->id();
            $error_msg = $e->getMessage();
            Log::channel('admin')->error($description . '. ' . $error_msg);

            return false;
        }

        return [
            'personal' => $personal,
            'passport' => $passport,
            'visa' => $visa,
            'legal_document' => $legal_document,
            'other_info' => $other_info,
        ];
    }

    public function softDelete(PersonalInfo $personal)
    {
        try {
            DB::beginTransaction();

            $personal_id = $personal->id;
            (new PassportInfoService())->softDelete($personal_id);
            (new VisaInfoService())->softDelete($personal_id);
            (new LegalDocumentService())->softDelete($personal_id);
            (new OtherInfoService())->softDelete($personal_id);

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();

            $description = 'Application Delete. user_id: ' . auth()->id();
            $error_msg = $e->getMessage();
            Log::channel('admin')->error($description . '. ' . $error_msg);

            return false;
        }

        return $personal->delete();
    }
}
