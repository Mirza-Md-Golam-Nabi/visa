<?php

namespace App\Http\Controllers;

use App\Enums\BioSubmissionStatusEnum;
use App\Enums\PassengerCurrentStatusEnum;
use App\Http\Requests\Medical\StoreMedicalRequest;
use App\Http\Requests\Medical\UpdateMedicalRequest;
use App\Models\Medical;
use App\Models\MedicalCenter;
use App\Services\Medical\MedicalService;

class MedicalController extends Controller
{
    protected $medical;
    protected $title;

    public function __construct()
    {
        $this->title = 'Medical';
        $this->medical = new MedicalService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = $this->title;
        $medicals = $this->medical->index();
        return view('admin.medical.index', compact('title', 'medicals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = $this->title;

        $medical_centers = MedicalCenter::get();
        $medical_statuses = PassengerCurrentStatusEnum::cases();
        $current_statuses = PassengerCurrentStatusEnum::cases();
        $bio_submission_statuses = BioSubmissionStatusEnum::cases();

        return view('admin.medical.create', compact('title', 'medical_centers', 'medical_statuses', 'current_statuses', 'bio_submission_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicalRequest $request)
    {
        $medical = $this->medical->store($request->validated());

        if ($medical) {
            session()->flash('success', 'Successfully store medical report.');
            return redirect()->route('medicals.index');
        } else {
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Medical $medical)
    {
        $title = $this->title;

        $medical->load('passenger', 'medical_center');
        return view('admin.medical.show', compact('title', 'medical'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medical $medical)
    {
        $title = $this->title;

        $medical->load('passenger');

        $medical_centers = MedicalCenter::get();
        $medical_statuses = PassengerCurrentStatusEnum::cases();
        $current_statuses = PassengerCurrentStatusEnum::cases();
        $bio_submission_statuses = BioSubmissionStatusEnum::cases();
        $calling_statuses = ['Yes', 'No'];

        return view('admin.medical.edit', compact('title', 'medical', 'medical_centers', 'medical_statuses', 'current_statuses', 'bio_submission_statuses', 'calling_statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicalRequest $request, Medical $medical)
    {
        $update = $this->medical->update($request->validated(), $medical);

        if ($update) {
            session()->flash('success', 'Medical updated successfully');
        } else {
            session()->flash('error', 'Medical does not update successfully');
            return redirect()->back()->withInput();
        }

        return redirect()->route('medicals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medical $medical)
    {
        $delete = $this->medical->softDelete($medical);

        if ($delete) {
            session()->flash('success', 'Medical deleted successfully');
        } else {
            session()->flash('error', 'Medical does not delete successfully');
        }

        return redirect()->route('medicals.index');
    }
}
