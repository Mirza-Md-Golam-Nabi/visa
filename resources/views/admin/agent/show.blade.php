<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Agent Type</label>
                            <span class="form-control">{{ $agent->agent_type->description() }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Agent Group</label>
                            <span class="form-control">{{ $agent->agent_group }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Name</label>
                            <span class="form-control">{{ $agent->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">NID No</label>
                            <span class="form-control">{{ $agent->nid_no }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gender</label>
                            <span class="form-control">{{ $agent->gender }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Father Name</label>
                            <span class="form-control">{{ $agent->father_name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Mother Name</label>
                            <span class="form-control">{{ $agent->mother_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Village/House</label>
                            <span class="form-control">{{ $agent->village_house }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Road/Block/Sector</label>
                            <span class="form-control">{{ $agent->road_block_sector }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <span class="form-control">{{ $agent->country }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Division</label>
                            <span class="form-control">{{ $agent->division->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">District</label>
                            <span class="form-control">{{ $agent->district->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Police Station</label>
                            <span class="form-control">{{ $agent->police_station }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <span class="form-control">{{ $agent->email }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Post Office</label>
                            <span class="form-control">{{ $agent->post_office }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Contact No</label>
                            <span class="form-control">{{ $agent->contact_no }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Emergency Phone Number</label>
                            <span class="form-control">{{ $agent->emergency_name_phone }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Agent Photo</label>
                            <span class="form-control">{{ $agent->agent_image }}</span>
                        </div>
                    </div>
                    <a href="{{ route('agents.index') }}">
                        <button class="btn btn-secondary">Back</button>
                        <a href="{{ route('agents.edit', $agent) }}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
