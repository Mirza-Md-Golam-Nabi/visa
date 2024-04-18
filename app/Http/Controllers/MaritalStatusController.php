<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaritalStatus\StoreMaritalStatusRequest;
use App\Http\Requests\MaritalStatus\UpdateMaritalStatusRequest;
use App\Models\MaritalStatus;
use App\Services\MaritalStatus\MaritalStatusService;

class MaritalStatusController extends Controller
{
    protected $marital_status;

    public function __construct()
    {
        $this->marital_status = new MaritalStatusService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marital_statuses = $this->marital_status->index();
        return view('admin.marital-status.index', compact('marital_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaritalStatusRequest $request)
    {
        $marital_status = $this->marital_status->store($request->validated());

        if ($marital_status) {
            session()->flash('success', 'Create new marital status.');
        } else {
            session()->flash('error', 'Something went wrong. Please try again.');
        }

        return redirect()->back();
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
    public function edit(MaritalStatus $marital_status)
    {
        return view('admin.marital-status.edit', compact('marital_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaritalStatusRequest $request, MaritalStatus $marital_status)
    {
        $update = $this->marital_status->update($request->validated(), $marital_status);

        if ($update) {
            session()->flash('success', 'Marital status updated successfully');
        } else {
            session()->flash('error', 'Marital status does not update successfully');
        }

        return redirect()->route('marital-statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaritalStatus $marital_status)
    {
        $delete = $this->marital_status->softDelete($marital_status);

        if ($delete) {
            session()->flash('success', 'Marital status deleted successfully');
        } else {
            session()->flash('error', 'Marital status does not delete successfully');
        }

        return redirect()->route('marital-statuses.index');
    }
}
