<h3 class="mb-3 text-primary">Visa</h3>
<div class="row mb-3">
    <div class="col-md-6">
        <label for="visa_info_id" class="form-label">Visa No</label>
        <select class="form-control @error('visa_info_id') is-invalid @enderror" name="visa_info_id" id="visa_info_id">
            <option value="">Select One</option>
            @foreach ($visas as $visa)
                <option value="{{ $visa->id }}" @selected(old('visa_info_id'))>{{ $visa->visa_no }}</option>
            @endforeach
        </select>
        @error('visa_info_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="sponsor_id" class="form-label">Sponsor ID</label>
        <span class="form-control" id="sponsor_id">&nbsp;</span>
    </div>
</div>
