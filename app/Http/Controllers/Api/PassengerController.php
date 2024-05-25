<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passenger\StorePassengerRequest;
use App\Http\Requests\Passenger\UpdatePassengerRequest;
use App\Models\Passenger;
use App\Services\Passenger\PassengerService;
use App\Services\Passport\PassportService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PassengerController extends Controller
{
    protected $passenger;
    protected $passport;

    public function __construct()
    {
        $this->passenger = new PassengerService;
        $this->passport = new PassportService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $passengers = $this->passenger->index();
        return formatResponse(0, 200, "success", $passengers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePassengerRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $passenger = $this->passenger->store($request->validated());
            $this->passport->store(
                $request->validated() + ['passenger_id' => $passenger->id]
            );

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            $description = 'Passenger Store.';
            $error_msg = $e->getMessage();
            Log::channel('admin')->error($description . ' ' . $error_msg);

            return formatResponse(1, 400, "Something went wrong. Please try again.", null);
        }

        return formatResponse(0, 200, "Successfully store.", $passenger->load('passport'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Passenger $passenger): JsonResponse
    {
        $passenger->load(
            'passenger_agent',
            'service_agent',
            'division',
            'district',
            'passport',
            'passport.passport_issue'
        );

        return formatResponse(0, 200, 'Successfully show', $passenger);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePassengerRequest $request, Passenger $passenger): JsonResponse
    {
        $this->passenger->update($request->validated(), $passenger);
        return formatResponse(0, 200, 'Successfully update', $passenger->refresh()->load(
            'passenger_agent',
            'service_agent',
            'division',
            'district',
            'passport',
            'passport.passport_issue'
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passenger $passenger): JsonResponse
    {
        $this->passenger->softDelete($passenger);
        return $this->index();

    }
}
