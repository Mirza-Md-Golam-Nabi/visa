<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\StoreGenderRequest;
use App\Http\Requests\Gender\UpdateGenderRequest;
use App\Models\Gender;
use App\Services\Gender\GenderService;

class GenderController extends Controller
{
    protected $gender;

    public function __construct()
    {
        $this->gender = new GenderService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = $this->gender->index();
        return view('admin.gender.index', compact('genders'));
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
    public function store(StoreGenderRequest $request)
    {
        $gender = $this->gender->store($request->validated());

        if ($gender) {
            session()->flash('success', 'Create new gender.');
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
            session()->flash('error', 'Gender not deleted successfully');
        }

        return redirect()->route('genders.index');
    }
}
