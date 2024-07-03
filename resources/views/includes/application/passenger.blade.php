<h3 class="mb-3 text-primary">Passenger Details</h3>

<div class="row mb-3">
    <div class="col-md-4">
        <label for="agent" class="form-label">Agent <span class="text-danger">*</span></label>
        <select class="form-control @error('agent') is-invalid @enderror" name="agent" id="agent" required>
            <option value="">Select One</option>
            @foreach ($passenger_agents as $passenger_agent)
                <option value="{{ $passenger_agent->id }}" @selected(old('agent') == $passenger_agent->id)>
                    {{ $passenger_agent->name }}
                </option>
            @endforeach
        </select>
        @error('agent')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="passenger_name" class="form-label">Passenger Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('passenger_name') is-invalid @enderror" name="passenger_name"
            id="passenger_name" value="{{ old('passenger_name') }}" required>
        @error('passenger_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="nid_no" class="form-label">NID No</label>
        <input type="number" class="form-control @error('nid_no') is-invalid @enderror" name="nid_no" id="nid_no"
            value="{{ old('nid_no') }}">
        @error('nid_no')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
        <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" required>
            <option value="">Select One</option>
            @foreach ($genders as $gender)
                <option value="{{ $gender->value }}" @selected(old('gender') == $gender->value)>
                    {{ $gender->description() }}</option>
            @endforeach
        </select>
        @error('gender')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob"
            value="{{ old('dob') }}" required>
        @error('dob')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="father_name" class="form-label">Father Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name"
            id="father_name" value="{{ old('father_name') }}" required>
        @error('father_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="mother_name" class="form-label">Mother Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name"
            id="mother_name" value="{{ old('mother_name') }}" required>
        @error('mother_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="spouse_name" class="form-label">Spouse Name</label>
        <input type="text" class="form-control @error('spouse_name') is-invalid @enderror" name="spouse_name"
            id="spouse_name" value="{{ old('spouse_name') }}">
        @error('spouse_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="religion" class="form-label">Religion <span class="text-danger">*</span></label>
        <select class="form-control @error('religion') is-invalid @enderror" name="religion" id="religion" required>
            <option value="">Select One</option>
            @foreach ($religions as $religion)
                <option value="{{ $religion->value }}" @selected(old('religion') == $religion->value)>
                    {{ $religion->description() }}</option>
            @endforeach
        </select>
        @error('religion')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="marital_status" class="form-label">Marital Status <span class="text-danger">*</span></label>
        <select class="form-control @error('marital_status') is-invalid @enderror" name="marital_status"
            id="marital_status" required>
            <option value="">Select One</option>
            @foreach ($marital_statuses as $marital_status)
                <option value="{{ $marital_status->value }}" @selected(old('marital_status') == $marital_status->value)>
                    {{ $marital_status->description() }}</option>
            @endforeach
        </select>
        @error('marital_status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="target_country" class="form-label">Target Country <span class="text-danger">*</span></label>
        <select class="form-control @error('target_country') is-invalid @enderror" name="target_country"
            id="target_country" required>
            <option value="Saudi Arabia">Saudi Arabia</option>
        </select>
        @error('target_country')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="passenger_type" class="form-label">Passenger Type <span class="text-danger">*</span></label>
        <select class="form-control @error('passenger_type') is-invalid @enderror" name="passenger_type"
            id="passenger_type" required>
            <option value="">Select One</option>
            @foreach ($passenger_types as $passenger_type)
                <option value="{{ $passenger_type->value }}" @selected(old('passenger_type') == $passenger_type->value)>
                    {{ $passenger_type->description() }}</option>
            @endforeach
        </select>
        @error('passenger_type')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="village_house" class="form-label">Village/House</label>
        <input type="text" class="form-control @error('village_house') is-invalid @enderror" name="village_house"
            id="village_house" value="{{ old('village_house') }}">
        @error('village_house')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="division_id" class="form-label">Division <span class="text-danger">*</span></label>
        <select name="division_id" id="division_id" class="form-control @error('division_id') is-invalid @enderror"
            required>
            <option value="">Select one</option>
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" @selected(old('division_id') == $division->id)>
                    {{ $division->name }}</option>
            @endforeach
        </select>
        @error('division_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="district_id" class="form-label">District <span class="text-danger">*</span></label>
        <select name="district_id" id="district_id" class="form-control @error('district_id') is-invalid @enderror"
            required>
            <option value="">Select one</option>
        </select>
        @error('district_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="police_station" class="form-label">Police Station <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('police_station') is-invalid @enderror"
            name="police_station" id="police_station" value="{{ old('police_station') }}" required>
        @error('police_station')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="post_office" class="form-label">Post Office</label>
        <input type="text" class="form-control @error('post_office') is-invalid @enderror" name="post_office"
            id="post_office" value="{{ old('post_office') }}">
        @error('post_office')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="contact_no" class="form-label">Contact No <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no"
            id="contact_no" value="{{ old('contact_no') }}" required>
        @error('contact_no')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="current_status" class="form-label">Current Status</label>
        <select name="current_status" id="current_status"
            class="form-control @error('current_status') is-invalid @enderror">
            <option value="">Select one</option>
            @foreach ($current_statuses as $current_status)
                <option value="{{ $current_status->value }}" @selected(old('current_status') == $current_status->value)>
                    {{ $current_status->description() }}</option>
            @endforeach
        </select>
        @error('current_status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="emergency_name_contact" class="form-label">Emergency Name &
            Contact</label>
        <input type="text" class="form-control @error('emergency_name_contact') is-invalid @enderror"
            name="emergency_name_contact" id="emergency_name_contact" value="{{ old('emergency_name_contact') }}">
        @error('emergency_name_contact')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="recruiting_agent" class="form-label">Recruiting Agent</label>
        <select name="recruiting_agent" id="recruiting_agent"
            class="form-control @error('recruiting_agent') is-invalid @enderror">
            <option value="">Select one</option>
            @foreach ($service_agents as $service_agent)
                <option value="{{ $service_agent->id }}" @selected(old('recruiting_agent') == $service_agent->id)>
                    {{ $service_agent->name }}
                </option>
            @endforeach
        </select>
        @error('recruiting_agent')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="passenger_picture" class="form-label">Passenger Picture</label>
        <input type="file" name="passenger_picture" id="passenger_picture"
            class="form-control @error('passenger_picture') is-invalid @enderror">
        @error('passenger_picture')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
