<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-3 text-primary">Passenger Details</h3>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Agent</label>
                            <span class="form-control">{{ $passenger->passenger_agent->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passenger Name</label>
                            <span class="form-control">{{ $passenger->passenger_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">NID No</label>
                            <span class="form-control">{{ $passenger->nid_no }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <span class="form-control">{{ $passenger->gender->description() }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date of Birth</label>
                            <span class="form-control">{{ $passenger->dob }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Father Name</label>
                            <span class="form-control">{{ $passenger->father_name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Mother Name</label>
                            <span class="form-control">{{ $passenger->mother_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Spouse Name</label>
                            <span class="form-control">{{ $passenger->spouse_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Religion</label>
                            <span class="form-control">{{ $passenger->religion->description() }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Marital Stauts</label>
                            <span class="form-control">{{ $passenger->marital_status->description() }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Target Country</label>
                            <span class="form-control">{{ $passenger->target_country }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passenger Type</label>
                            <span class="form-control">{{ $passenger->passenger_type->description() }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Village/House</label>
                            <span class="form-control">{{ $passenger->village_house }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Division</label>
                            <span class="form-control">{{ $passenger->division->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">District</label>
                            <span class="form-control">{{ $passenger->district->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Police Station</label>
                            <span class="form-control">{{ $passenger->police_station }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Post Office</label>
                            <span class="form-control">{{ $passenger->post_office }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Contact No</label>
                            <span class="form-control">{{ $passenger->contact_no }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Current Status</label>
                            <span class="form-control">{{ $passenger->current_status->description() }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Emergency Name & Phone</label>
                            <span class="form-control">{{ $passenger->emergency_name_contact }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Recruiting Agent</label>
                            <span class="form-control">{{ $passenger->service_agent->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Passenger Picture</label>
                            <span class="form-control">{{ $passenger->passenger_picture }}</span>
                        </div>
                    </div>
                    <div class="py-2">
                        <hr>
                    </div>
                    <h3 class="mb-3 text-primary">Passport Details</h3>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Previous Passport</label>
                            <span class="form-control">{{ $passenger->passport->previous_passport }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passport No</label>
                            <span class="form-control">{{ $passenger->passport->passport_no }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passport Type</label>
                            <span class="form-control">{{ $passenger->passport->passport_type->description() }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Passport Issue Date</label>
                            <span class="form-control">{{ $passenger->passport->passport_issue_date }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passport Issue Place</label>
                            <span class="form-control">{{ $passenger->passport->passport_issue->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passport Expire Date</label>
                            <span class="form-control">{{ $passenger->passport->passport_expire_date }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Passport Picture</label>
                            <span class="form-control">{{ $passenger->passport->passport_picture }}</span>
                        </div>
                    </div>
                    <a href="{{ route('passengers.index') }}">
                        <button class="btn btn-secondary">Back</button>
                    </a>
                    <a href="{{ route('passengers.edit', $passenger) }}" title="Edit" class="mr-2 text-primary">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
