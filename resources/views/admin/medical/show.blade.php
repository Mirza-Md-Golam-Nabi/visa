<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Passenger Name</label>
                            <span class="form-control">{{ $medical->passenger->passenger_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Medical Center</label>
                            <span class="form-control">{{ $medical->medical_center->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Medical Serial No</label>
                            <span class="form-control">{{ $medical->medical_serial_no }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Medical Exam/Issue Date</label>
                            <span class="form-control">{{ $medical->medical_exam_issue_date }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Medical Report/Expire
                                Date</label>
                            <span class="form-control">{{ $medical->medical_report_expire_date }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Medical Status</label>
                            <span class="form-control">{{ $medical->medical_status->description() }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">MOFA Number</label>
                            <span class="form-control">{{ $medical->mofa_number }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Current Status</label>
                            <span class="form-control">{{ $medical->current_status->description() }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Comment</label>
                            <span class="form-control">{{ $medical->comment }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">BIO Submission Date</label>
                            <span class="form-control">{{ $medical->bio_submit_date }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">BIO Submission Status</label>
                            <span class="form-control">{{ $medical->bio_submit_status->description() }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Calling Date</label>
                            <span class="form-control">{{ $medical->calling_date }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Calling Status</label>
                            <span class="form-control">{{ $medical->calling_status }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Medical Receipt</label>
                            <span class="form-control">{{ $medical->medical_receipt }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Medical Certificate</label>
                            <span class="form-control">{{ $medical->medical_certificate }}</span>
                        </div>
                    </div>
                    <a href="{{ route('medicals.index') }}">
                        <button class="btn btn-secondary">Back</button>
                        <a href="{{ route('medicals.edit', $medical) }}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
