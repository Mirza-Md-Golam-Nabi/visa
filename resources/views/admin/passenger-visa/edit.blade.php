<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-3 text-primary">Visa Details</h3>
                    <form action="{{ route('passenger-visas.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $passenger_visa->id ?? '' }}">
                        <input type="hidden" name="passenger_id" id="passenger_id"
                            value="{{ $passenger_visa->passenger_id ?? '' }}">
                        <input type="hidden" name="visa_info_id" id="visa_info_id"
                            value="{{ $passenger_visa->visa_info_id ?? '' }}">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="passenger_name" class="form-label">Passenger Name</label>
                                <input class="form-control" id="passenger_name"
                                    value="{{ $passenger_visa->passenger->passenger_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="visa_number" class="form-label">Visa Number</label>
                                <input class="form-control" id="visa_number"
                                    value="{{ $passenger_visa->visa_info->visa_no ?? '' }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="sponsor_id" class="form-label">Sponsor ID</label>
                                <input class="form-control" id="sponsor_id"
                                    value="{{ $passenger_visa->visa_info->sponsor_id ?? '' }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="visa_issue_date" class="form-label">Visa Issue Date</label>
                                <input type="date"
                                    class="form-control @error('visa_issue_date') is-invalid @enderror"
                                    name="visa_issue_date" id="visa_issue_date" value="{{ old('visa_issue_date') }}">
                                @error('visa_issue_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="mofa_number" class="form-label">MOFA Number</label>
                                <input class="form-control @error('mofa_number') is-invalid @enderror" type="text"
                                    name="mofa_number" id="mofa_number" value="{{ old('mofa_number') }}">
                                @error('mofa_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="stamp_submit_date" class="form-label">Stamp Submit Date</label>
                                <input class="form-control @error('mofa_number') is-invalid @enderror" type="date"
                                    id="stamp_submit_date" name="stamp_submit_date">
                                @error('mofa_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="visa_stamping_date" class="form-label">Visa Stamping Date</label>
                                <input class="form-control @error('visa_stamping_date') is-invalid @enderror"
                                    id="visa_stamping_date" name="visa_stamping_date" type="date">
                                @error('visa_stamping_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="embassy_attest" class="form-label">Embassy Attestation</label>
                                <select class="form-control @error('embassy_attest') is-invalid @enderror"
                                    id="embassy_attest" name="embassy_attest">
                                    <option value="">Select One</option>
                                    @foreach ($embassy_attesten as $embassy_attest)
                                        <option value="{{ $embassy_attest->value }}" @selected(old('embassy_attestation') == $embassy_attest->value)>
                                            {{ $embassy_attest->description() }}</option>
                                    @endforeach
                                </select>
                                @error('embassy_attest')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="finger_status" class="form-label">Finger Status</label>
                                <select class="form-control @error('finger_status') is-invalid @enderror"
                                    id="finger_status" name="finger_status">
                                    <option value="">Select One</option>
                                    @foreach ($finger_statuses as $finger_status)
                                        <option value="{{ $finger_status->value }}" @selected(old('finger_status') == $finger_status->value)>
                                            {{ $finger_status->description() }}</option>
                                    @endforeach
                                </select>
                                @error('finger_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="police_clearance_number" class="form-label">Police Clearance Number</label>
                                <input class="form-control @error('police_clearance_number') is-invalid @enderror"
                                    id="police_clearance_number" name="police_clearance_number"
                                    value="{{ old('police_clearance_number') }}">
                                @error('police_clearance_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="musanad" class="form-label">Musanad</label>
                                <input class="form-control @error('musanad') is-invalid @enderror" id="musanad"
                                    name="musanad" value="{{ old('musanad') }}">
                                @error('musanad')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="delivery_date" class="form-label">Delivery Date</label>
                                <input class="form-control @error('delivery_date') is-invalid @enderror"
                                    id="delivery_date" name="delivery_date" value="{{ old('delivery_date') }}"
                                    type="date">
                                @error('delivery_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="recruiting_agency" class="form-label">Recruiting Agency</label>
                                <select class="form-control @error('recruiting_agency') is-invalid @enderror"
                                    id="recruiting_agency" name="recruiting_agency">
                                    <option value="{{ $auth_user->id }}">{{ $auth_user->name }}</option>
                                </select>
                                @error('recruiting_agency')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="sponsor_name_arabic" class="form-label">Sponsor Name Arabic</label>
                                <input class="form-control @error('sponsor_name_arabic') is-invalid @enderror"
                                    id="sponsor_name_arabic" name="sponsor_name_arabic"
                                    value="{{ old('sponsor_name_arabic') }}" type="text">
                                @error('sponsor_name_arabic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="sponsor_name_english" class="form-label">Sponsor Name English</label>
                                <input class="form-control @error('mofa_number') is-invalid @enderror"
                                    id="sponsor_name_english" name="sponsor_name_english"
                                    value="{{ old('sponsor_name_english') }}" type="text">
                                @error('sponsor_name_english')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="profession_arabic" class="form-label">Profession Arabic</label>
                                <input class="form-control @error('profession_arabic') is-invalid @enderror"
                                    id="profession_arabic" name="profession_arabic"
                                    value="{{ old('profession_arabic') }}" type="text">
                                @error('profession_arabic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="profession_english" class="form-label">Profession English</label>
                                <input class="form-control @error('profession_english') is-invalid @enderror"
                                    id="profession_english" name="profession_english"
                                    value="{{ old('profession_english') }}" type="text">
                                @error('profession_english')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="salary" class="form-label">Salary</label>
                                <input class="form-control @error('salary') is-invalid @enderror" id="salary"
                                    name="salary" value="{{ old('salary') }}" type="text">
                                @error('salary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="visa_stamp" class="form-label">Visa Stamp</label>
                                <select class="form-control @error('visa_stamp') is-invalid @enderror"
                                    id="visa_stamp" name="visa_stamp">
                                    <option value="">Select One</option>
                                    @foreach ($visa_stamps as $visa_stamp)
                                        <option value="{{ $visa_stamp->value }}" @selected(old('visa_stamp') == $visa_stamp->value)>
                                            {{ $visa_stamp->description() }}</option>
                                    @endforeach
                                </select>
                                @error('visa_stamp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="ministry_permission" class="form-label">Ministry Permission</label>
                                <select class="form-control @error('ministry_permission') is-invalid @enderror"
                                    id="ministry_permission" name="ministry_permission">
                                    <option value="">Select One</option>
                                    @foreach ($ministry_permissions as $ministry_permission)
                                        <option value="{{ $ministry_permission->value }}"
                                            @selected(old('ministry_permission') == $ministry_permission->value)>
                                            {{ $ministry_permission->description() }}</option>
                                    @endforeach
                                </select>
                                @error('ministry_permission')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="okala_number" class="form-label">Okala number</label>
                                <input class="form-control @error('okala_number') is-invalid @enderror"
                                    id="okala_number" name="okala_number" value="{{ old('okala_number') }}"
                                    type="text">
                                @error('okala_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="current_status" class="form-label">Current Status</label>
                                <select class="form-control @error('current_status') is-invalid @enderror"
                                    id="current_status" name="current_status">
                                    <option value="">Select One</option>
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
                                <label for="visa_status" class="form-label">Visa Status</label>
                                <select class="form-control @error('visa_status') is-invalid @enderror"
                                    id="visa_status" name="visa_status">
                                    <option value="">Select One</option>
                                    @foreach ($visa_statuses as $visa_status)
                                        <option value="{{ $visa_status->value }}" @selected(old('visa_status') == $visa_status->value)>
                                            {{ $visa_status->description() }}</option>
                                    @endforeach
                                </select>
                                @error('visa_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="enjaz_visa_copy" class="form-label">Enjaz Visa Copy</label>
                                <input class="form-control @error('enjaz_visa_copy') is-invalid @enderror"
                                    id="enjaz_visa_copy" name="enjaz_visa_copy" type="file">
                                @error('enjaz_visa_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="visa_stamp_copy" class="form-label">Visa Stamp Copy</label>
                                <input class="form-control @error('visa_stamp_copy') is-invalid @enderror"
                                    id="visa_stamp_copy" name="visa_stamp_copy" type="file">
                                @error('visa_stamp_copy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $("#job_id").focus(function() {
                $("#search_result").text("");
            });
        });
    </script>

</x-app-layout>
