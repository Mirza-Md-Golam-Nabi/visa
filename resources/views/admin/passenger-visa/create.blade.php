<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-3 text-primary">Visa Details</h3>
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <label for="job_id" class="form-label"><b>Enter Passenger JOB ID</b></label>
                        </div>
                        <div class="px-4">
                            <input type="text" class="form-control" id="job_id">
                        </div>
                        <div>
                            <span class="btn btn-sm btn-primary" id="find_job_id">Search</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <span class="" id="search_result"></span>
                    </div>
                    <hr>
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
                                    name="visa_issue_date" id="visa_issue_date"
                                    value="{{ old('visa_issue_date') ?? $passenger_visa->visa_issue_date }}">
                                @error('visa_issue_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="mofa_number" class="form-label">MOFA Number</label>
                                <input class="form-control @error('mofa_number') is-invalid @enderror" type="text"
                                    name="mofa_number" id="mofa_number"
                                    value="{{ old('mofa_number') ?? $passenger_visa->mofa_number }}">
                                @error('mofa_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="stamp_submit_date" class="form-label">Stamp Submit Date</label>
                                <input class="form-control @error('stamp_submit_date') is-invalid @enderror"
                                    type="date" id="stamp_submit_date" name="stamp_submit_date"
                                    value="{{ old('stamp_submit_date') ?? $passenger_visa->stamp_submit_date }}">
                                @error('stamp_submit_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="visa_stamping_date" class="form-label">Visa Stamping Date</label>
                                <input class="form-control @error('visa_stamping_date') is-invalid @enderror"
                                    id="visa_stamping_date" name="visa_stamping_date" type="date"
                                    value="{{ old('stamp_submit_date') ?? $passenger_visa->stamp_submit_date }}">
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
                                        @php
                                            $isSelected =
                                                old('embassy_attestation') == $embassy_attest->value ||
                                                $passenger_visa->embassy_attest == $embassy_attest->value;
                                        @endphp
                                        <option value="{{ $embassy_attest->value }}" @selected($isSelected)>
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
                                        @php
                                            $isSelected =
                                                old('finger_status') == $finger_status->value ||
                                                $passenger_visa->finger_status == $finger_status->value;
                                        @endphp
                                        <option value="{{ $finger_status->value }}" @selected($isSelected)>
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
                                <label for="police_clearance_number" class="form-label">Police Clearance
                                    Number</label>
                                <input class="form-control @error('police_clearance_number') is-invalid @enderror"
                                    id="police_clearance_number" name="police_clearance_number"
                                    value="{{ old('police_clearance_number') ?? $passenger_visa->police_clearance_number }}">
                                @error('police_clearance_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="musanad" class="form-label">Musanad</label>
                                <input class="form-control @error('musanad') is-invalid @enderror" id="musanad"
                                    name="musanad" value="{{ old('musanad') ?? $passenger_visa->musanad }}">
                                @error('musanad')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="delivery_date" class="form-label">Delivery Date</label>
                                <input class="form-control @error('delivery_date') is-invalid @enderror"
                                    id="delivery_date" name="delivery_date"
                                    value="{{ old('delivery_date') ?? $passenger_visa->delivery_date }}"
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
                                <input style="direction: rtl"
                                    class="form-control @error('sponsor_name_arabic') is-invalid @enderror"
                                    id="sponsor_name_arabic" name="sponsor_name_arabic"
                                    value="{{ old('sponsor_name_arabic') ?? $passenger_visa->sponsor_name_arabic }}"
                                    type="text">
                                @error('sponsor_name_arabic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="sponsor_name_english" class="form-label">Sponsor Name English</label>
                                <input class="form-control @error('sponsor_name_english') is-invalid @enderror"
                                    id="sponsor_name_english" name="sponsor_name_english"
                                    value="{{ old('sponsor_name_english') ?? $passenger_visa->sponsor_name_english }}"
                                    type="text">
                                @error('sponsor_name_english')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="profession_arabic" class="form-label">Profession Arabic</label>
                                <input style="direction: rtl"
                                    class="form-control @error('profession_arabic') is-invalid @enderror"
                                    id="profession_arabic" name="profession_arabic"
                                    value="{{ old('profession_arabic') ?? $passenger_visa->profession_arabic }}"
                                    type="text">
                                @error('profession_arabic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="profession_english" class="form-label">Profession English</label>
                                <input class="form-control @error('profession_english') is-invalid @enderror"
                                    id="profession_english" name="profession_english"
                                    value="{{ old('profession_english') ?? $passenger_visa->profession_english }}"
                                    type="text">
                                @error('profession_english')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="salary" class="form-label">Salary</label>
                                <input class="form-control @error('salary') is-invalid @enderror" id="salary"
                                    name="salary" value="{{ old('salary') ?? $passenger_visa->salary }}"
                                    type="text">
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
                                        @php
                                            $isSelected =
                                                old('visa_stamp') == $visa_stamp->value ||
                                                $passenger_visa->visa_stamp == $visa_stamp->value;
                                        @endphp
                                        <option value="{{ $visa_stamp->value }}" @selected($isSelected)>
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
                                        @php
                                            $isSelected =
                                                old('ministry_permission') == $ministry_permission->value ||
                                                $passenger_visa->ministry_permission == $ministry_permission->value;
                                        @endphp
                                        <option value="{{ $ministry_permission->value }}"
                                            @selected($isSelected)>
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
                                    id="okala_number" name="okala_number"
                                    value="{{ old('okala_number') ?? $passenger_visa->okala_number }}"
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
                                        @php
                                            $isSelected =
                                                old('current_status') == $current_status->value ||
                                                $passenger_visa->current_status == $current_status->value;
                                        @endphp
                                        <option value="{{ $current_status->value }}" @selected($isSelected)>
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
                                        @php
                                            $isSelected =
                                                old('visa_status') == $visa_status->value ||
                                                $passenger_visa->visa_status == $visa_status->value;
                                        @endphp
                                        <option value="{{ $visa_status->value }}" @selected($isSelected)>
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
