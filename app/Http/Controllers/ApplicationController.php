<?php

namespace App\Http\Controllers;

use App\Models\Gender;
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
        $genders = Gender::orderBy('title', 'asc')->get();
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gender $gender)
    {
        return view('admin.gender.edit', compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenderRequest $request, Gender $gender)
    {
        $update = $this->gender->update($request->validated(), $gender);

        if ($update) {
            session()->flash('success', 'Gender updated successfully');
        } else {
            session()->flash('error', 'Gender does not update successfully');
        }

        return redirect()->route('genders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gender $gender)
    {
        $delete = $this->gender->softDelete($gender);

        if ($delete) {
            session()->flash('success', 'Gender deleted successfully');
        } else {
            session()->flash('error', 'Gender does not delete successfully');
        }

        return redirect()->route('genders.index');
    }
}
