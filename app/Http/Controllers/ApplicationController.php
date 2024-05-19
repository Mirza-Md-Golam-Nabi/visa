<?php

namespace App\Http\Controllers;

use App\Enum\GenderEnum;
use App\Models\Religion;
use App\Models\LicenseType;
use App\Models\MaritalStatus;
use App\Models\TravelPurpose;
use App\Services\Application\ApplicationService;
use App\Http\Requests\Application\StoreApplicationRequest;

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
        $genders = GenderEnum::cases();
        $marital_statuses = MaritalStatus::orderBy('title', 'asc')->get();
        $religions = Religion::orderBy('title', 'asc')->get();
        $travel_purposes = TravelPurpose::orderBy('title', 'asc')->get();
        $license_types = LicenseType::orderBy('title', 'asc')->get();

        return view('admin.application.create', compact('genders', 'marital_statuses', 'religions', 'travel_purposes', 'license_types'));
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
