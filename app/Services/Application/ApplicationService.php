<?php

namespace App\Services\Application;

use App\Models\Passenger;
use App\Services\PassengerVisa\PassengerVisaService;
use App\Services\Passenger\PassengerService;
use App\Services\Passport\PassportService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApplicationService
{
    protected $passenger_service;
    protected $passport_service;
    protected $passenger_visa_service;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->passenger_service = new PassengerService;
        $this->passport_service = new PassportService;
        $this->passenger_visa_service = new PassengerVisaService;
    }

    public function index(): object
    {
        return $this->passenger_service->index();
    }

    public function store(array $data): mixed
    {
        try {
            DB::beginTransaction();

            $passenger = $this->passenger_service->store($data);
            $passenger_id = ['passenger_id' => $passenger->id];
            $passport = $this->passport_service->store($data + $passenger_id);
            $visa = $this->passenger_visa_service->store($data + $passenger_id);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            $description = 'Application Store. user_id: ' . auth()->id();
            $error_msg = $e->getMessage();
            Log::channel('admin')->error($description . '. ' . $error_msg);

            return false;
        }

        return [
            'passenger' => $passenger,
            'passport' => $passport,
            'visa' => $visa,
        ];
    }

    public function update(array $data, Passenger $personal): array
    {
        try {
            DB::beginTransaction();

            $personal_id = $personal->id;
            $personal->update($data);
            $passport = $this->passport_service->update($data, $personal_id);
            $visa = $this->passenger_visa_service->update($data, $personal_id);

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
        ];
    }

    public function softDelete(Passenger $personal)
    {
        try {
            DB::beginTransaction();

            $personal_id = $personal->id;
            $this->passport_service->softDelete($personal_id);
            $this->passenger_visa_service->softDelete($personal_id);

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
