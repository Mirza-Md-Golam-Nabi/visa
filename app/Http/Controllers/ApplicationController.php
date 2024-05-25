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
use App\Http\Requests\Application\StoreApplicationRequest;
use App\Models\Agent;
use App\Models\District;
use App\Models\Division;
use App\Models\VisaInfo;
use App\Services\Application\ApplicationService;

class ApplicationController extends Controller
{
    protected $application;

    public function __construct()
    {
        $this->application = new ApplicationService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = $this->application->index();
        return view('admin.application.index', compact('applications'));
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
        $visas = VisaInfo::getVisaAndSponsorId();

        return view('admin.application.create', compact('service_agents', 'passenger_agents', 'genders', 'religions', 'marital_statuses', 'passenger_types', 'districts', 'divisions', 'current_statuses', 'passport_types', 'visas'));
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
}
