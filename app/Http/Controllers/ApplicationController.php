<?php

namespace App\Http\Controllers;

use App\Enums\AgentGroupEnum;
use App\Enums\AgentTypeEnum;
use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use App\Enums\PassengerCurrentStatusEnum;
use App\Enums\PassportTypeEnum;
use App\Enums\ReligionEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Application\StoreApplicationRequest;
use App\Models\Agent;
use App\Models\District;
use App\Models\Division;
use App\Models\Passenger;
use App\Models\PassengerVisa;
use App\Models\VisaInfo;
use App\Services\Application\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $application;
    protected $title;

    public function __construct()
    {
        $this->title = 'Application';
        $this->application = new ApplicationService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = $this->title;
        $applications = $this->application->index();
        return view('admin.application.index', compact('title', 'applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = $this->title;

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
        $visas = VisaInfo::getVisaAndSponsorId();

        return view('admin.application.create', compact('title', 'service_agents', 'passenger_agents', 'genders', 'religions', 'marital_statuses', 'passenger_types', 'districts', 'divisions', 'current_statuses', 'passport_types', 'visas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        $application = $this->application->store($request->validated());

        if ($application) {
            session()->flash('success', 'Create new application.');
            return redirect()->route('applications.index');
        } else {
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        $title = $this->title;

        return view('admin.application.edit', compact('title'));
    }

    public function visaWithPassengerForm()
    {
        $title = 'Visa with Passenger';
        $passengers = Passenger::get();
        $visas = VisaInfo::get();
        $passenger_visas = PassengerVisa::with('passenger', 'visa_info')->orderBy('id', 'desc')->get();
        return view('admin.application.visa-with-passenger', compact('title', 'passengers', 'visas', 'passenger_visas'));
    }

    public function visaWithPassenger(Request $request)
    {
        $validated = $request->validate([
            'passenger_id' => 'required',
            'visa_info_id' => 'required',
        ]);

        $passenger_visa = PassengerVisa::create($validated);

        if ($passenger_visa) {
            session()->flash('success', 'Attached a visa for a passenger');
        } else {
            session()->flash('error', 'Visa does not attach for a passenger');
        }

        return redirect()->route('visa.with.passenger.form');
    }
}
