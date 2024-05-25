<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-3 text-primary">Medical Details</h3>
                    <form action="{{ route('medicals.update', $medical) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="passenger_name" class="form-label">Passenger Name</label>
                                <input id="passenger_name" class="form-control"
                                    value="{{ $medical->passenger->passenger_name }}" readonly>
                                <input type="hidden" name="passenger_id" id="passenger_id"
                                    value="{{ $medical->passenger_id }}">
                            </div>
                            <div class="col-md-4">
                                <label for="medical_center_id" class="form-label">Medical Center</label>
                                <select name="medical_center_id" id="medical_center_id"
                                    class="form-control @error('medical_center_id') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    @foreach ($medical_centers as $medical_center)
                                        @php
                                            $isSelected =
                                                old('medical_center_id') == $medical_center->id ||
                                                $medical_center->id == $medical->medical_center_id;
                                        @endphp
                                        <option value="{{ $medical_center->id }}" @selected($isSelected)>
                                            {{ $medical_center->name }}</option>
                                    @endforeach
                                </select>
                                @error('medical_center_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="medical_serial_no" class="form-label">Medical Serial No</label>
                                <input type="text"
                                    class="form-control @error('medical_serial_no') is-invalid @enderror"
                                    name="medical_serial_no" id="medical_serial_no"
                                    value="{{ old('medical_serial_no') ?? $medical->medical_serial_no }}">
                                @error('medical_serial_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="medical_exam_issue_date" class="form-label">Medical Exam/Issue Date</label>
                                <input type="date"
                                    class="form-control @error('medical_exam_issue_date') is-invalid @enderror"
                                    name="medical_exam_issue_date" id="medical_exam_issue_date"
                                    value="{{ old('medical_exam_issue_date') ?? $medical->medical_exam_issue_date }}">
                                @error('medical_exam_issue_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="medical_report_expire_date" class="form-label">Medical Report/Expire
                                    Date</label>
                                <input type="date" name="medical_report_expire_date" id="medical_report_expire_date"
                                    class="form-control @error('medical_report_expire_date') is-invalid @enderror"
                                    value="{{ old('medical_report_expire_date') ?? $medical->medical_report_expire_date }}">
                                @error('medical_report_expire_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="medical_status" class="form-label">Medical Status</label>
                                <select class="form-control @error('medical_status') is-invalid @enderror"
                                    name="medical_status" id="medical_status">
                                    <option value="">Select One</option>
                                    @foreach ($medical_statuses as $medical_status)
                                        @php
                                            $isSelected =
                                                old('medical_status') == $medical_status->value ||
                                                $medical_status->value == $medical->medical_status->value;
                                        @endphp
                                        <option value="{{ $medical_status->value }}" @selected($isSelected)>
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
                                    name="mofa_number" id="mofa_number"
                                    value="{{ old('mofa_number') ?? $medical->mofa_number }}">
                                @error('mofa_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="current_status" class="form-label">Current Status</label>
                                <select class="form-control @error('current_status') is-invalid @enderror"
                                    name="current_status" id="current_status">
                                    <option value="">Select One</option>
                                    @foreach ($current_statuses as $current_status)
                                        @php
                                            $isSelected =
                                                old('current_status') == $current_status->value ||
                                                $current_status->value == $medical->current_status->value;
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
                                <label for="comment" class="form-label">Comment</label>
                                <input type="text" class="form-control @error('comment') is-invalid @enderror"
                                    name="comment" id="comment" value="{{ old('comment') ?? $medical->comment }}">
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="bio_submit_date" class="form-label">BIO Submission Date</label>
                                <input type="date" name="bio_submit_date" id="bio_submit_date"
                                    class="form-control @error('bio_submit_date') is-invalid @enderror"
                                    value="{{ old('bio_submit_date') ?? $medical->bio_submit_date }}">
                                @error('bio_submit_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="bio_submit_status" class="form-label">BIO Submission Status</label>
                                <select name="bio_submit_status" id="bio_submit_status"
                                    class="form-control @error('bio_submit_status') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    @foreach ($bio_submission_statuses as $bio_submission_status)
                                        @php
                                            $isSelected =
                                                old('bio_submit_status') == $bio_submission_status->value ||
                                                $bio_submission_status->value == $medical->bio_submit_status->value;
                                        @endphp
                                        <option value="{{ $bio_submission_status->value }}"
                                            @selected($isSelected)>
                                            {{ $bio_submission_status->description() }}</option>
                                    @endforeach
                                </select>
                                @error('bio_submit_status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="calling_date" class="form-label">Calling Date</label>
                                <input type="date" name="calling_date" id="calling_date"
                                    class="form-control @error('calling_date') is-invalid @enderror"
                                    value="{{ old('calling_date') ?? $medical->calling_date }}">
                                @error('calling_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="calling_status" class="form-label">Calling Status</label>
                                <select name="calling_status" id="calling_status"
                                    class="form-control @error('calling_status') is-invalid @enderror">
                                    <option value="">Select one</option>
                                    @foreach ($calling_statuses as $calling_status)
                                        @php
                                            $isSelected =
                                                old('calling_status') == $calling_status ||
                                                $calling_status == $medical->calling_status;
                                        @endphp
                                        <option value="{{ $calling_status }}" @selected($isSelected)>
                                            {{ $calling_status }}</option>
                                    @endforeach
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
