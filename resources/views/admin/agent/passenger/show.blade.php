<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Agent Group</label>
                            <span class="form-control">{{ $passenger_agent->agent_group }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Name</label>
                            <span class="form-control">{{ $passenger_agent->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">NID No</label>
                            <span class="form-control">{{ $passenger_agent->nid_no }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <span class="form-control">{{ $passenger_agent->gender }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Father Name</label>
                            <span class="form-control">{{ $passenger_agent->father_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mother Name</label>
                            <span class="form-control">{{ $passenger_agent->mother_name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Village/House</label>
                            <span class="form-control">{{ $passenger_agent->village_house }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Road/Block/Sector</label>
                            <span class="form-control">{{ $passenger_agent->road_block_sector }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <span class="form-control">{{ $passenger_agent->country }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Division</label>
                            <span class="form-control">{{ $passenger_agent->division }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">District</label>
                            <span class="form-control">{{ $passenger_agent->district }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Police Station</label>
                            <span class="form-control">{{ $passenger_agent->police_station }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <span class="form-control">{{ $passenger_agent->email }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Post Office</label>
                            <span class="form-control">{{ $passenger_agent->post_office }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Contact No</label>
                            <span class="form-control">{{ $passenger_agent->contact_no }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Emergency Phone Number</label>
                            <span class="form-control">{{ $passenger_agent->emergency_name_phone }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Agent Photo</label>
                            <span class="form-control">{{ $passenger_agent->agent_image }}</span>
                        </div>
                    </div>
                    <a href="{{ route('passenger-agents.index') }}">
                        <button class="btn btn-secondary">Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
