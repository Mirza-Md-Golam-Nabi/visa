<h3 class="mb-3 text-primary">Passport Details</h3>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="previous_passport" class="form-label">
            Previous Passport <span class="text-danger">(if applicable)</span>
        </label>
        <input type="text" class="form-control @error('previous_passport') is-invalid @enderror"
            name="previous_passport" id="previous_passport" value="{{ old('previous_passport') }}">
        @error('previous_passport')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="passport_no" class="form-label">Passport No <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('passport_no') is-invalid @enderror" name="passport_no"
            id="passport_no" value="{{ old('passport_no') }}" required>
        @error('passport_no')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="passport_type" class="form-label">Passport Type <span class="text-danger">*</span></label>
        <select class="form-control @error('passport_type') is-invalid @enderror" name="passport_type"
            id="passport_type" required>
            <option value="">Select One</option>
            @foreach ($passport_types as $passport_type)
                <option value="{{ $passport_type->value }}" @selected(old('passport_type') == $passport_type->value)>
                    {{ $passport_type->description() }}</option>
            @endforeach
        </select>
        @error('passport_type')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="passport_issue_date" class="form-label">Passport Issue Date <span
                class="text-danger">*</span></label>
        <input type="date" class="form-control @error('passport_issue_date') is-invalid @enderror"
            name="passport_issue_date" id="passport_issue_date" value="{{ old('passport_issue_date') }}" required>
        @error('passport_issue_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="passport_issue_place" class="form-label">Passport Issue Place <span
                class="text-danger">*</span></label>
        <select class="form-control @error('passport_issue_place') is-invalid @enderror" name="passport_issue_place"
            id="passport_issue_place" required>
            <option value="">Select One</option>
            @foreach ($districts as $district)
                <option value="{{ $district->id }}">{{ $district->name }}</option>
            @endforeach
        </select>
        @error('passport_issue_place')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="passport_expire_date" class="form-label">Passport Expire Date <span
                class="text-danger">*</span></label>
        <input type="date" class="form-control @error('passport_expire_date') is-invalid @enderror"
            name="passport_expire_date" id="passport_expire_date" value="{{ old('passport_expire_date') }}" required>
        @error('passport_expire_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4">
        <label for="passport_picture" class="form-label">Passport Picture</label>
        <input type="file" class="form-control @error('passport_picture') is-invalid @enderror"
            name="passport_picture" id="passport_picture" value="{{ old('passport_picture') }}">
        @error('passport_picture')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
