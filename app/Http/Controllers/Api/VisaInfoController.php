<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visa\StoreVisaInfoRequest;
use App\Http\Requests\Visa\UpdateVisaInfoRequest;
use App\Models\VisaInfo;
use App\Services\VisaInfo\VisaInfoService;
use Illuminate\Http\JsonResponse;

class VisaInfoController extends Controller
{
    private $visa;

    public function __construct()
    {
        $this->visa = new VisaInfoService();
    }

    public function index(): JsonResponse
    {
        $visas = $this->visa->index();
        return formatResponse(0, 200, "success", $visas);
    }

    public function store(StoreVisaInfoRequest $request): JsonResponse
    {
        $visa = $this->visa->store($request->validated());
        return formatResponse(0, 200, "success", $visa);
    }

    public function show(VisaInfo $visa): JsonResponse
    {
        return formatResponse(0, 200, 'Success', $visa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisaInfoRequest $request, VisaInfo $visa): JsonResponse
    {
        $this->visa->update($request->validated(), $visa);
        return formatResponse(0, 200, 'Success', $visa->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisaInfo $visa): JsonResponse
    {
        $this->visa->softDelete($visa);
        return $this->index();
    }
}
