<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('service-agents.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="agent_group" class="form-label">Agent Group</label>
                                <input type="text" class="form-control @error('agent_group') is-invalid @enderror"
                                    name="agent_group" id="agent_group" value="{{ old('agent_group') }}">
                                @error('agent_group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="nid_no" class="form-label">NID No</label>
                                <input type="text" class="form-control @error('nid_no') is-invalid @enderror"
                                    name="nid_no" id="nid_no" value="{{ old('nid_no') }}">
                                @error('nid_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender"
                                    class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    <option value="female" @selected(old('gender') == 'female')>Female</option>
                                    <option value="male" @selected(old('gender') == 'male')>Male</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="father_name" class="form-label">Father Name</label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                    name="father_name" id="father_name" value="{{ old('father_name') }}">
                                @error('father_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="mother_name" class="form-label">Mother Name</label>
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                    name="mother_name" id="mother_name" value="{{ old('mother_name') }}">
                                @error('mother_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="village_house" class="form-label">Village/House</label>
                                <input type="text" class="form-control @error('village_house') is-invalid @enderror"
                                    name="village_house" id="village_house" value="{{ old('village_house') }}">
                                @error('village_house')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="road_block_sector" class="form-label">Road/Block/Sector</label>
                                <input type="text"
                                    class="form-control @error('road_block_sector') is-invalid @enderror"
                                    name="road_block_sector" id="road_block_sector"
                                    value="{{ old('road_block_sector') }}">
                                @error('road_block_sector')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    name="country" id="country" value="{{ old('country') }}">
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="division" class="form-label">Division</label>
                                <input type="text" class="form-control @error('division') is-invalid @enderror"
                                    name="division" id="division" value="{{ old('division') }}">
                                @error('division')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control @error('district') is-invalid @enderror"
                                    name="district" id="district" value="{{ old('district') }}">
                                @error('district')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="police_station" class="form-label">Police Station</label>
                                <input type="text"
                                    class="form-control @error('police_station') is-invalid @enderror"
                                    name="police_station" id="police_station" value="{{ old('police_station') }}">
                                @error('police_station')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="post_office" class="form-label">Post Office</label>
                                <input type="text" class="form-control @error('post_office') is-invalid @enderror"
                                    name="post_office" id="post_office" value="{{ old('post_office') }}">
                                @error('post_office')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="contact_no" class="form-label">Contact No</label>
                                <input type="text" class="form-control @error('contact_no') is-invalid @enderror"
                                    name="contact_no" id="emacontact_noil" value="{{ old('contact_no') }}">
                                @error('contact_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="emergency_name_phone" class="form-label">Emergency Phone Number</label>
                                <input type="text"
                                    class="form-control @error('emergency_name_phone') is-invalid @enderror"
                                    name="emergency_name_phone" id="emergency_name_phone"
                                    value="{{ old('emergency_name_phone') }}">
                                @error('emergency_name_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="agent_image" class="form-label">Agent Photo</label>
                                <input type="file" class="form-control @error('agent_image') is-invalid @enderror"
                                    name="agent_image" id="agent_image" value="{{ old('agent_image') }}">
                                @error('agent_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
