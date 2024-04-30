<fieldset class="border p-2">
    <legend class="w-auto">Passport Info</legend>
    <div class="row">
        <div class="col-md-3">
            <label for="passport_issue_place" class="form-label">Passport Issue Place</label>
            <input type="text" class="form-control @error('passport_issue_place') is-invalid @enderror"
                id="passport_issue_place" name="passport_issue_place" value="{{ old('passport_issue_place') }}">
            @error('passport_issue_place')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="passport_no" class="form-label">Passport No <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('passport_no') is-invalid @enderror" id="passport_no"
                name="passport_no" value="{{ old('passport_no') }}" required>
            @error('passport_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="passport_issue_date" class="form-label">Passport Issue Date <span
                    class="text-danger">*</span></label>
            <input type="date" class="form-control @error('passport_issue_date') is-invalid @enderror"
                id="passport_issue_date" name="passport_issue_date" value="{{ old('passport_issue_date') }}" required>
            @error('passport_issue_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="" class="form-label">Validity <span class="text-danger">*</span></label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="validity" id="5_years" value="5 years"
                        required @checked(old('validity') == '5 years')>
                    <label class="form-check-label" for="5_years">5 Years</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="validity" id="10_years" value="10 years"
                        @checked(old('validity') == '10 years')>
                    <label class="form-check-label" for="10_years">10 Years</label>
                </div>
            </div>
            @error('validity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</fieldset>
