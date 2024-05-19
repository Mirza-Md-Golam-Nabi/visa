<fieldset class="border p-2">
    <legend class="w-auto">Personal Info</legend>
    <div class="row">
        <div class="col-md-4">
            <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name"
                name="full_name" value="{{ old('full_name') }}" required>
            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="father_name" class="form-label">Father Name</label>
            <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name"
                name="father_name" value="{{ old('father_name') }}">
            @error('father_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="mother_name" class="form-label">Mother Name</label>
            <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name"
                name="mother_name" value="{{ old('mother_name') }}">
            @error('mother_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob"
                value="{{ old('dob') }}" required>
            @error('dob')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="birth_place" class="form-label">Birth Place <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place"
                name="birth_place" value="{{ old('birth_place') }}" required>
            @error('birth_place')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="" class="form-label d-block text-center">MOFA Applicaiton
                ID <span class="text-danger">*</span></label>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control @error('mofa_new_id') is-invalid @enderror"
                        id="mofa_new_id" name="mofa_new_id" value="{{ old('mofa_new_id') }}" placeholder="New MOFA"
                        required>
                    @error('mofa_new_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('mofa_old_id') is-invalid @enderror"
                        id="mofa_old_id" name="mofa_old_id" value="{{ old('mofa_old_id') }}" placeholder="Old MOFA">
                    @error('mofa_old_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                <option value="">Please Select One</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->value }}" @selected(old('gender') == $gender->value)>
                        {{ $gender->value }}
                    </option>
                @endforeach
            </select>
            @error('gender')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="marital_status" class="form-label">Marital Status <span class="text-danger">*</span></label>
            <select class="form-control @error('marital_status') is-invalid @enderror" id="marital_status"
                name="marital_status" required>
                <option value="">Please Select One</option>
                @foreach ($marital_statuses as $marital_status)
                    <option value="{{ $marital_status->title }}" @selected(old('marital_status') == $marital_status->title)>
                        {{ $marital_status->title }}
                    </option>
                @endforeach
            </select>
            @error('marital_status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="religion" class="form-label">Religion <span class="text-danger">*</span></label>
            <select class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion"
                required>
                <option value="">Please Select One</option>
                @foreach ($religions as $religion)
                    <option value="{{ $religion->title }}" @selected(old('religion') == $religion->title)>
                        {{ $religion->title }}
                    </option>
                @endforeach
            </select>
            @error('religion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="sect" class="form-label">Sect</label>
            <input type="text" class="form-control @error('sect') is-invalid @enderror" id="sect"
                name="sect" value="{{ old('sect') }}">
            @error('sect')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <label for="present_nationality" class="form-label">Present Nationality</label>
            <input type="text" class="form-control @error('present_nationality') is-invalid @enderror"
                id="present_nationality" name="present_nationality"
                value="{{ old('present_nationality') ?? 'Bangladeshi' }}">
            @error('present_nationality')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="previous_nationality" class="form-label">Previous Nationality</label>
            <input type="text" class="form-control @error('previous_nationality') is-invalid @enderror"
                id="previous_nationality" name="previous_nationality"
                value="{{ old('previous_nationality') ?? 'Bangladeshi' }}">
            @error('previous_nationality')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text"
                class="form-control @error('phone') is-invalid @enderror @error('phone') is-invalid @enderror"
                id="phone" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="present_address" class="form-label">Present Address</label>
            <input type="text" class="form-control @error('present_address') is-invalid @enderror"
                id="present_address" name="present_address" value="{{ old('present_address') }}">
            @error('present_address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="permanent_address" class="form-label">Permanent Address</label>
            <input type="text" class="form-control @error('permanent_address') is-invalid @enderror"
                id="permanent_address" name="permanent_address" value="{{ old('permanent_address') }}">
            @error('permanent_address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</fieldset>
