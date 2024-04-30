<fieldset class="border p-2">
    <legend class="w-auto">Visa Info</legend>
    <div class="row">
        <div class="col-md-3">
            <label for="visa_no" class="form-label">Visa No <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('visa_no') is-invalid @enderror" id="visa_no" name="visa_no"
                value="{{ old('visa_no') }}" required>
            @error('visa_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="visa_date" class="form-label">Visa Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('visa_date') is-invalid @enderror" id="visa_date"
                name="visa_date" value="{{ old('visa_date') }}" required>
            @error('visa_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="sponsor_name" class="form-label">Sponsor Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('sponsor_name') is-invalid @enderror" id="sponsor_name"
                name="sponsor_name" value="{{ old('sponsor_name') }}" required>
            @error('sponsor_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="sponsor_id" class="form-label">Sponsor ID <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('sponsor_id') is-invalid @enderror" id="sponsor_id"
                name="sponsor_id" value="{{ old('sponsor_id') }}" required>
            @error('sponsor_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <label for="visa_issue_place" class="form-label">Place of Issue</label>
            <input type="text" class="form-control @error('visa_issue_place') is-invalid @enderror"
                id="visa_issue_place" name="visa_issue_place" value="{{ old('visa_issue_place') }}">
            @error('visa_issue_place')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="qualification" class="form-label">Qualification</label>
            <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="qualification"
                name="qualification" value="{{ old('qualification') }}">
            @error('qualification')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="profession" class="form-label">Profession <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('profession') is-invalid @enderror" id="profession"
                name="profession" value="{{ old('profession') }}" required>
            @error('profession')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="travel_purpose" class="form-label">Travel Purpose</label>
            <select class="form-control @error('travel_purpose') is-invalid @enderror" id="travel_purpose"
                name="travel_purpose">
                <option value="">Please Select One</option>
                @foreach ($travel_purposes as $travel_purpose)
                    <option value="{{ $travel_purpose->title }}" @selected(old('travel_purpose') == $travel_purpose->title)>
                        {{ $travel_purpose->title }}
                    </option>
                @endforeach
            </select>
            @error('travel_purpose')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="musaned_no" class="form-label">Musaned No</label>
            <input type="text" class="form-control @error('musaned_no') is-invalid @enderror" id="musaned_no"
                name="musaned_no" value="{{ old('musaned_no') }}">
            @error('musaned_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="wakala_no" class="form-label">Wakala No <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('wakala_no') is-invalid @enderror" id="wakala_no"
                name="wakala_no" value="{{ old('wakala_no') }}" required>
            @error('wakala_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</fieldset>
