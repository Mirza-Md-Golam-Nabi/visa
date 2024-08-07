<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('agents.update', $agent) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="agent_type" class="form-label">Agent Type</label>
                                <select name="agent_type" id="agent_type"
                                    class="form-control @error('agent_type') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    @foreach ($agent_types as $agent_type)
                                        @php
                                            $isSelected =
                                                old('agent_type') == $agent_type->value ||
                                                $agent->agent_type->value == $agent_type->value;
                                        @endphp
                                        <option value="{{ $agent_type->value }}" @selected($isSelected)>
                                            {{ $agent_type->description() }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="agent_group" class="form-label">Agent Group</label>
                                <select name="agent_group" id="agent_group"
                                    class="form-control @error('agent_group') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    @foreach ($agent_groups as $agent_group)
                                        @php
                                            $isSelected =
                                                old('agent_group') == $agent_group->value ||
                                                $agent->agent_group->value == $agent_group->value;
                                        @endphp
                                        <option value="{{ $agent_group->value }}" @selected($isSelected)>
                                            {{ $agent_group->value }}</option>
                                    @endforeach
                                </select>
                                @error('agent_group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" value="{{ old('name') ?? $agent->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="nid_no" class="form-label">NID No</label>
                                <input type="text" class="form-control @error('nid_no') is-invalid @enderror"
                                    name="nid_no" id="nid_no" value="{{ old('nid_no') ?? $agent->nid_no }}">
                                @error('nid_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender"
                                    class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    @foreach ($genders as $gender)
                                        @php
                                            $isSelected =
                                                old('gender') == $gender->value ||
                                                $agent->gender->value == $gender->value;
                                        @endphp
                                        <option value="{{ $gender->value }}" @selected($isSelected)>
                                            {{ $gender->value }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="father_name" class="form-label">Father Name</label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                    name="father_name" id="father_name"
                                    value="{{ old('father_name') ?? $agent->father_name }}">
                                @error('father_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="mother_name" class="form-label">Mother Name</label>
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                    name="mother_name" id="mother_name"
                                    value="{{ old('mother_name') ?? $agent->mother_name }}">
                                @error('mother_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="village_house" class="form-label">Village/House</label>
                                <input type="text" class="form-control @error('village_house') is-invalid @enderror"
                                    name="village_house" id="village_house"
                                    value="{{ old('village_house') ?? $agent->village_house }}">
                                @error('village_house')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="road_block_sector" class="form-label">Road/Block/Sector</label>
                                <input type="text"
                                    class="form-control @error('road_block_sector') is-invalid @enderror"
                                    name="road_block_sector" id="road_block_sector"
                                    value="{{ old('road_block_sector') ?? $agent->road_block_sector }}">
                                @error('road_block_sector')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    name="country" id="country" value="{{ old('country') ?? $agent->country }}">
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="division_id" class="form-label">Division</label>
                                <select name="division_id" id="division_id"
                                    class="form-control @error('division_id') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    @foreach ($divisions as $division)
                                        @php
                                            $isSelected =
                                                old('division_id') == $division->id ||
                                                $agent->division_id == $division->id;
                                        @endphp
                                        <option value="{{ $division->id }}" @selected($isSelected)>
                                            {{ $division->name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="district_id" class="form-label">District</label>
                                <select name="district_id" id="district_id"
                                    class="form-control @error('district_id') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    @foreach ($districts as $district)
                                        @php
                                            $isSelected =
                                                old('district_id') == $district->id ||
                                                $agent->district_id == $district->id;
                                        @endphp
                                        <option value="{{ $district->id }}" @selected($isSelected)>
                                            {{ $district->name }}</option>
                                    @endforeach
                                </select>
                                @error('district')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="police_station" class="form-label">Police Station</label>
                                <input type="text"
                                    class="form-control @error('police_station') is-invalid @enderror"
                                    name="police_station" id="police_station"
                                    value="{{ old('police_station') ?? $agent->police_station }}">
                                @error('police_station')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') ?? $agent->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="post_office" class="form-label">Post Office</label>
                                <input type="text" class="form-control @error('post_office') is-invalid @enderror"
                                    name="post_office" id="post_office"
                                    value="{{ old('post_office') ?? $agent->post_office }}">
                                @error('post_office')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="contact_no" class="form-label">Contact No</label>
                                <input type="text" class="form-control @error('contact_no') is-invalid @enderror"
                                    name="contact_no" id="emacontact_noil"
                                    value="{{ old('contact_no') ?? $agent->contact_no }}">
                                @error('contact_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="emergency_name_phone" class="form-label">Emergency Phone Number</label>
                                <input type="text"
                                    class="form-control @error('emergency_name_phone') is-invalid @enderror"
                                    name="emergency_name_phone" id="emergency_name_phone"
                                    value="{{ old('emergency_name_phone') ?? $agent->emergency_name_phone }}">
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $('#division_id').change(function() {
                var division_id = $('#division_id').val();
                if (division_id != '') {
                    $.ajax({
                        url: "{{ route('general.fetch.district') }}?division_id=" + division_id,
                        method: 'GET',
                        success: function(data) {
                            $('#district_id').html(data);
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
