<?php

namespace App\Http\Controllers;

use App\Enums\EmbassyAttestEnum;
use App\Enums\FingerStatusEnum;
use App\Enums\MinistryPermissionEnum;
use App\Enums\PassengerCurrentStatusEnum;
use App\Enums\VisaStampEnum;
use App\Enums\VisaStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\PassengerVisa\StorePassengerVisaRequest;
use App\Models\Passenger;
use App\Models\PassengerVisa;
use App\Models\VisaInfo;
use App\Services\PassengerVisa\PassengerVisaService;
use Illuminate\Http\Request;

class PassengerVisaController extends Controller
{
    protected $passenger_visa;
    protected $title;

    public function __construct()
    {
        $this->title = 'Visa with Passenger';
        $this->passenger_visa = new PassengerVisaService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = $this->title;

        $passenger_visas = $this->passenger_visa->index();
        return view('admin.passenger-visa.index', compact('title', 'passenger_visas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = $this->title;

        $passenger_visa = null;
        if ($request->filled('passenger_visa')) {
            $passenger_visa = PassengerVisa::with('passenger', 'visa_info')->find($request->passenger_visa);
        }

        $embassy_attesten = EmbassyAttestEnum::cases();
        $finger_statuses = FingerStatusEnum::cases();
        $auth_user = authUser()->select('id', 'name')->first();
        $visa_stamps = VisaStampEnum::cases();
        $ministry_permissions = MinistryPermissionEnum::cases();
        $current_statuses = PassengerCurrentStatusEnum::cases();
        $visa_statuses = VisaStatusEnum::cases();

        return view('admin.passenger-visa.create', compact('title', 'passenger_visa', 'embassy_attesten', 'finger_statuses', 'auth_user', 'visa_stamps', 'ministry_permissions', 'current_statuses', 'visa_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePassengerVisaRequest $request)
    {
        $passenger_visa = $this->passenger_visa->visaDetailsUpdate($request->validated());

        if ($passenger_visa) {
            session()->flash('success', 'Update your visa details.');
            return redirect()->route('passenger-visas.index');
        } else {
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PassengerVisa $passenger_visa)
    {
        $title = $this->title;

        $passenger_visa->load('passenger', 'visa_info');

        $embassy_attesten = EmbassyAttestEnum::cases();
        $finger_statuses = FingerStatusEnum::cases();
        $auth_user = authUser()->select('id', 'name')->first();
        $visa_stamps = VisaStampEnum::cases();
        $ministry_permissions = MinistryPermissionEnum::cases();
        $current_statuses = PassengerCurrentStatusEnum::cases();
        $visa_statuses = VisaStatusEnum::cases();

        return view('admin.passenger-visa.create', compact('title', 'passenger_visa', 'embassy_attesten', 'finger_statuses', 'auth_user', 'visa_stamps', 'ministry_permissions', 'current_statuses', 'visa_statuses'));

    }

    public function visaWithPassengerForm()
    {
        $title = $this->title;

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
