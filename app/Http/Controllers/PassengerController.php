<?php

namespace App\Http\Controllers;

use App\Enum\AgentGroupEnum;
use App\Enum\AgentTypeEnum;
use App\Enum\GenderEnum;
use App\Enum\MaritalStatusEnum;
use App\Enum\PassengerCurrentStatusEnum;
use App\Enum\PassportTypeEnum;
use App\Enum\ReligionEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Passenger\StorePassengerRequest;
use App\Http\Requests\Passenger\UpdatePassengerRequest;
use App\Models\Agent;
use App\Models\District;
use App\Models\Division;
use App\Models\Passenger;
use App\Services\Passenger\PassengerService;
use App\Services\Passport\PassportService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PassengerController extends Controller
{
    protected $passenger;
    protected $passport;

    public function __construct()
    {
        $this->passenger = new PassengerService();
        $this->passport = new PassportService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passengers = $this->passenger->index();
        return view('admin.passenger.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service_agents = Agent::select('id', 'name')
            ->where('agent_type', AgentTypeEnum::SERVICE_AGENT)
            ->get();

        $passenger_agents = Agent::select('id', 'name')
            ->where('agent_type', AgentTypeEnum::PASSENGER_AGENT)
            ->get();

        $genders = GenderEnum::cases();
        $religions = ReligionEnum::cases();
        $marital_statuses = MaritalStatusEnum::cases();
        $passenger_types = AgentGroupEnum::cases();
        $divisions = Division::orderBy('name', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        $current_statuses = PassengerCurrentStatusEnum::cases();
        $passport_types = PassportTypeEnum::cases();

        return view('admin.passenger.create', compact('service_agents', 'passenger_agents', 'genders', 'religions', 'marital_statuses', 'passenger_types', 'divisions', 'districts', 'current_statuses', 'passport_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePassengerRequest $request)
    {
        try {
            DB::beginTransaction();

            $passenger = $this->passenger->store($request->validated());
            $this->passport->store(
                $request->validated() + ['passenger_id' => $passenger->id]
            );

            DB::commit();

            session()->flash('success', 'Create new passenger.');
            return redirect()->route('passengers.index');

        } catch (Exception $e) {
            DB::rollback();

            $description = 'Passenger Store.';
            $error_msg = $e->getMessage();
            Log::channel('admin')->error($description . ' ' . $error_msg);

            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Passenger $passenger)
    {
        $passenger->load(
            'passenger_agent',
            'service_agent',
            'division',
            'district',
            'passport',
            'passport.passport_issue'
        );

        return view('admin.passenger.show', compact('passenger'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Passenger $passenger)
    {
        $service_agents = Agent::select('id', 'name')
            ->where('agent_type', AgentTypeEnum::SERVICE_AGENT)
            ->get();

        $passenger_agents = Agent::select('id', 'name')
            ->where('agent_type', AgentTypeEnum::PASSENGER_AGENT)
            ->get();

        $genders = GenderEnum::cases();
        $religions = ReligionEnum::cases();
        $marital_statuses = MaritalStatusEnum::cases();
        $passenger_types = AgentGroupEnum::cases();
        $divisions = Division::orderBy('name', 'asc')->get();
        $dist = District::where('division_id', $passenger->division_id)->orderBy('name', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        $current_statuses = PassengerCurrentStatusEnum::cases();
        $passport_types = PassportTypeEnum::cases();

        return view('admin.passenger.edit', compact('passenger', 'service_agents', 'passenger_agents', 'genders', 'religions', 'marital_statuses', 'passenger_types', 'divisions', 'dist', 'districts', 'current_statuses', 'passport_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePassengerRequest $request, Passenger $passenger)
    {
        try {
            DB::beginTransaction();

            $this->passenger->update($request->validated(), $passenger);

            $this->passport->update($request->validated(), $passenger->id);

            DB::commit();

            session()->flash('success', 'Passenger updated successfully');
            return redirect()->route('passengers.index');

        } catch (Exception $e) {
            DB::rollback();

            $description = 'Passenger Update. Passenger ID: ' . $passenger->id;
            $error_msg = $e->getMessage();
            Log::channel('admin')->error($description . ' ' . $error_msg);

            session()->flash('error', 'Passenger does not update successfully');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passenger $passenger)
    {
        try {
            DB::beginTransaction();

            $this->passport->softDelete($passenger->id);
            $this->passenger->softDelete($passenger);

            DB::commit();

            session()->flash('success', 'Passenger deleted successfully');

        } catch (Exception $e) {
            DB::rollback();

            $description = 'Passenger Delete. Passenger ID: ' . $passenger->id;
            $error_msg = $e->getMessage();
            Log::channel('admin')->error($description . ' ' . $error_msg);

            session()->flash('error', 'Passenger does not delete successfully');
        }

        return redirect()->route('passengers.index');
    }
}
