<fieldset class="border p-2">
    <legend class="w-auto">Police Clearance & Driving License Info</legend>
    <div class="row">
        <div class="col-md-6">
            <label for="pc_ref_no" class="form-label">Police Clearance No <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('pc_ref_no') is-invalid @enderror" id="pc_ref_no"
                name="pc_ref_no" value="{{ old('pc_ref_no') }}" required>
            @error('pc_ref_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="license_type" class="form-label">License Type</label>
            <select class="form-control @error('license_type') is-invalid @enderror" id="license_type"
                name="license_type">
                <option value="">Please Select One</option>
                @foreach ($license_types as $license_type)
                    <option value="{{ $license_type->title }}" @selected(old('license_type') == $license_type->title)>
                        {{ $license_type->title }}
                    </option>
                @endforeach
            </select>
            @error('license_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</fieldset>
