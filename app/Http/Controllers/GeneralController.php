<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Passenger;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function districtFetch(Request $request)
    {
        $division_id = $request->get('division_id');
        $districts = District::where('division_id', $division_id)
            ->orderBy('name', 'asc')
            ->get();

        if (count($districts) > 0) {
            $output = '<option value="">Please Select One</option>';
            foreach ($districts as $district) {
                $output .= '<option value="' . $district->id . '">' . $district->name . '</option>';
            }
        } else {
            $output = '<option value="">No Data Found</option>';
        }
        return $output;
    }

    public function passengerFetch(Request $request)
    {
        $job_id = $request->get('job_id');
        $passenger = Passenger::where('id', $job_id)->select('id', 'passenger_name')->first();

        return $passenger;
    }

    public function passengerAllDataFetch(Request $request)
    {
        $job_id = $request->get('job_id');
        $passenger = Passenger::with(
            'passenger_agent',
            'service_agent',
            'division',
            'district',
            'passport',
            'passport.passport_issue'
        )
            ->where('id', $job_id)
            ->first();

        if ($passenger) {
            $passenger->gender_value = $passenger->gender->description();
            $passenger->religion_value = $passenger->religion->description();
            $passenger->marital_status_value = $passenger->marital_status->description();
            $passenger->passenger_type_value = $passenger->passenger_type->description();
            $passenger->current_status_value = $passenger->current_status->description();
            $passenger->passport->passport_type_value = $passenger->passport->passport_type->description();
        }

        return $passenger;
    }
}
