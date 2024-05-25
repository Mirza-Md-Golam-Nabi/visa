<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Passenger;
use App\Models\VisaInfo;
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
}
