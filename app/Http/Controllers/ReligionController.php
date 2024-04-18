<?php

namespace App\Http\Controllers;

use App\Http\Requests\Religion\StoreReligionRequest;
use App\Http\Requests\Religion\UpdateReligionRequest;
use App\Models\Religion;
use App\Services\Religion\ReligionService;

class ReligionController extends Controller
{
    protected $religion;

    public function __construct()
    {
        $this->religion = new ReligionService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $religions = $this->religion->index();
        return view('admin.religion.index', compact('religions'));
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
    public function store(StoreReligionRequest $request)
    {
        $religion = $this->religion->store($request->validated());

        if ($religion) {
            session()->flash('success', 'Create new religion.');
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
    public function edit(Religion $religion)
    {
        return view('admin.religion.edit', compact('religion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReligionRequest $request, Religion $religion)
    {
        $update = $this->religion->update($request->validated(), $religion);

        if ($update) {
            session()->flash('success', 'Religion updated successfully');
        } else {
            session()->flash('error', 'Religion does not update successfully');
        }

        return redirect()->route('religions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Religion $religion)
    {
        $delete = $this->religion->softDelete($religion);

        if ($delete) {
            session()->flash('success', 'Religion deleted successfully');
        } else {
            session()->flash('error', 'Religion does not delete successfully');
        }

        return redirect()->route('religions.index');
    }
}
