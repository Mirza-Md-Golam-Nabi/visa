<fieldset class="border p-2">
    <legend class="w-auto">Others Info</legend>
    <div class="row">
        <div class="col-md-4">
            <label for="stay_duration" class="form-label">Duration of Stay</label>
            <input type="text" class="form-control @error('stay_duration') is-invalid @enderror" id="stay_duration"
                name="stay_duration" value="{{ old('stay_duration') }}">
            @error('stay_duration')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="arrival_date" class="form-label">Date of Arrival</label>
            <input type="date" class="form-control @error('arrival_date') is-invalid @enderror" id="arrival_date"
                name="arrival_date" value="{{ old('arrival_date') }}">
            @error('arrival_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="departure_date" class="form-label">Date of Departure</label>
            <input type="date" class="form-control @error('departure_date') is-invalid @enderror" id="departure_date"
                name="departure_date" value="{{ old('departure_date') }}">
            @error('departure_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</fieldset>
