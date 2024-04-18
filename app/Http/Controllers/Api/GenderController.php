<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\StoreGenderRequest;
use App\Http\Requests\Gender\UpdateGenderRequest;
use App\Models\Gender;
use App\Services\Gender\GenderService;
use Illuminate\Http\JsonResponse;

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
    public function index(): JsonResponse
    {
        $genders = $this->gender->index();
        return formatResponse(0, 200, 'Success', $genders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenderRequest $request): JsonResponse
    {
        $gender = $this->gender->store($request->validated());
        return formatResponse(0, 200, 'Success', $gender);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gender $gender): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $gender);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenderRequest $request, Gender $gender): JsonResponse
    {
        $this->gender->update($request->validated(), $gender);
        return formatResponse(0, 200, 'Success', $gender->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gender $gender): JsonResponse
    {
        $this->gender->softDelete($gender);
        return $this->index();
    }
}
