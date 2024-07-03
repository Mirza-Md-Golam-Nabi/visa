<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-3 text-primary">Medical Details</h3>
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
                    <form action="{{ route('medicals.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="passenger_name" class="form-label">Passenger Name</label>
                                <input id="passenger_name" class="form-control" readonly>
                                <input type="hidden" name="passenger_id" id="passenger_id" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="medical_center_id" class="form-label">Medical Center <span
                                        class="text-danger">*</span></label>
                                <select name="medical_center_id" id="medical_center_id"
                                    class="form-control @error('medical_center_id') is-invalid @enderror" required>
                                    <option value="">Select one</option>
                                    @foreach ($medical_centers as $medical_center)
                                        <option value="{{ $medical_center->id }}" @selected(old('medical_center_id') == $medical_center->id)>
                                            {{ $medical_center->name }}</option>
                                    @endforeach
                                </select>
                                @error('medical_center_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="medical_serial_no" class="form-label">Medical Serial No <span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('medical_serial_no') is-invalid @enderror"
                                    name="medical_serial_no" id="medical_serial_no"
                                    value="{{ old('medical_serial_no') }}" required>
                                @error('medical_serial_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="medical_exam_issue_date" class="form-label">Medical Exam/Issue Date <span
                                        class="text-danger">*</span></label>
                                <input type="date"
                                    class="form-control @error('medical_exam_issue_date') is-invalid @enderror"
                                    name="medical_exam_issue_date" id="medical_exam_issue_date"
                                    value="{{ old('medical_exam_issue_date') }}" required>
                                @error('medical_exam_issue_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="medical_report_expire_date" class="form-label">Medical Report/Expire
                                    Date <span class="text-danger">*</span></label>
                                <input type="date" name="medical_report_expire_date" id="medical_report_expire_date"
                                    class="form-control @error('medical_report_expire_date') is-invalid @enderror"
                                    value="{{ old('medical_report_expire_date') }}" required>
                                @error('medical_report_expire_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="medical_status" class="form-label">Medical Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control @error('medical_status') is-invalid @enderror"
                                    name="medical_status" id="medical_status" required>
                                    <option value="">Select One</option>
                                    @foreach ($medical_statuses as $medical_status)
                                        <option value="{{ $medical_status->value }}" @selected(old('medical_status') == $medical_status->value)>
                                            {{ $medical_status->description() }}</option>
                                    @endforeach
                                </select>
                                @error('medical_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="mofa_number" class="form-label">MOFA Number</label>
                                <input type="text" class="form-control @error('mofa_number') is-invalid @enderror"
                                    name="mofa_number" id="mofa_number" value="{{ old('mofa_number') }}">
                                @error('mofa_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="current_status" class="form-label">Current Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control @error('current_status') is-invalid @enderror"
                                    name="current_status" id="current_status" required>
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
                                <label for="comment" class="form-label">Comment</label>
                                <input type="text" class="form-control @error('comment') is-invalid @enderror"
                                    name="comment" id="comment" value="{{ old('comment') }}">
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="bio_submit_date" class="form-label">BIO Submission Date <span class="text-danger">*</span></label>
                                <input type="date" name="bio_submit_date" id="bio_submit_date"
                                    class="form-control @error('bio_submit_date') is-invalid @enderror"
                                    value="{{ old('bio_submit_date') }}" required>
                                @error('bio_submit_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="bio_submit_status" class="form-label">BIO Submission Status <span class="text-danger">*</span></label>
                                <select name="bio_submit_status" id="bio_submit_status"
                                    class="form-control @error('bio_submit_status') is-invalid @enderror" required>
                                    <option value="">Select one</option>
                                    @foreach ($bio_submission_statuses as $bio_submission_status)
                                        <option value="{{ $bio_submission_status->value }}" @selected(old('bio_submit_status') == $bio_submission_status->value)>
                                            {{ $bio_submission_status->description() }}</option>
                                    @endforeach
                                </select>
                                @error('bio_submit_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="calling_date" class="form-label">Calling Date <span class="text-danger">*</span></label>
                                <input type="date" name="calling_date" id="calling_date"
                                    class="form-control @error('calling_date') is-invalid @enderror"
                                    value="{{ old('calling_date') }}" required>
                                @error('calling_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="calling_status" class="form-label">Calling Status <span class="text-danger">*</span></label>
                                <select name="calling_status" id="calling_status"
                                    class="form-control @error('calling_status') is-invalid @enderror" required>
                                    <option value="">Select one</option>
                                    <option value="No" @selected(old('calling_status') == 'No')>No</option>
                                    <option value="Yes" @selected(old('calling_status') == 'Yes')>Yes</option>
                                </select>
                                @error('calling_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="medical_receipt" class="form-label">Medical Receipt</label>
                                <input type="file"
                                    class="form-control @error('medical_receipt') is-invalid @enderror"
                                    name="medical_receipt" id="medical_receipt"
                                    value="{{ old('medical_receipt') }}">
                                @error('medical_receipt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="medical_certificate" class="form-label">Medical Certificate</label>
                                <input type="file"
                                    class="form-control @error('medical_certificate') is-invalid @enderror"
                                    name="medical_certificate" id="medical_certificate"
                                    value="{{ old('medical_certificate') }}">
                                @error('medical_certificate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $('#find_job_id').click(function() {
                var job_id = $('#job_id').val();
                if (job_id != '') {
                    $.ajax({
                        url: "{{ route('general.fetch.passenger') }}?job_id=" + job_id,
                        method: 'GET',
                        success: function(data) {
                            if (data) {
                                $('#passenger_id').val(data.id);
                                $('#passenger_name').val(data.passenger_name);
                                $('#search_result').attr('class', 'text-primary');
                                $('#search_result').text('Your Job ID has been found.');
                            } else {
                                $('#search_result').attr('class', 'text-danger');
                                $('#search_result').text('Job ID does not match.');
                                $('#passenger_id').val("");
                                $('#passenger_name').val("");
                            }
                        }
                    });
                }
            });

            $("#job_id").focus(function() {
                $("#search_result").text("");
            });
        });
    </script>

</x-app-layout>
