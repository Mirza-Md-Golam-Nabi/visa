<?php

namespace App\Http\Controllers;

use App\Http\Requests\Visa\StoreVisaInfoRequest;
use App\Http\Requests\Visa\UpdateVisaInfoRequest;
use App\Models\VisaInfo;
use App\Services\VisaInfo\VisaInfoService;

class VisaInfoController extends Controller
{
    protected $visa;

    public function __construct()
    {
        $this->visa = new VisaInfoService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visas = $this->visa->index();
        return view('admin.visa.index', compact('visas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisaInfoRequest $request)
    {
        $visa = $this->visa->store($request->validated());

        if ($visa) {
            session()->flash('success', 'Create new visa.');
            return redirect()->route('visas.index');
        } else {
            session()->flash('error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(VisaInfo $visa)
    {
        return view('admin.visa.show', compact('visa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisaInfo $visa)
    {
        return view('admin.visa.edit', compact('visa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisaInfoRequest $request, VisaInfo $visa)
    {
        $update = $this->visa->update($request->validated(), $visa);

        if ($update) {
            session()->flash('success', 'Visa updated successfully');
        } else {
            session()->flash('error', 'Visa does not update successfully');
        }

        return redirect()->route('visas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisaInfo $visa)
    {
        $delete = $this->visa->softDelete($visa);

        if ($delete) {
            session()->flash('success', 'Visa deleted successfully');
        } else {
            session()->flash('error', 'Visa does not delete successfully');
        }

        return redirect()->route('visas.index');
    }
}
