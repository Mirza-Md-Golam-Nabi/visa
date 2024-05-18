<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Passenger Agent Name</label>
                            <span class="form-control">{{ $visa->passenger_agent_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Service Agent Name</label>
                            <span class="form-control">{{ $visa->service_agent_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Visa No</label>
                            <span class="form-control">{{ $visa->visa_no }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Category</label>
                            <span class="form-control">{{ $visa->category }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Quantity</label>
                            <span class="form-control">{{ $visa->quantity }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Visa Date</label>
                            <span class="form-control">{{ $visa->visa_date }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Sponsor Name</label>
                            <span class="form-control">{{ $visa->sponsor_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sponsor ID</label>
                            <span class="form-control">{{ $visa->sponsor_id }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Visa Issue Place</label>
                            <span class="form-control">{{ $visa->visa_issue_place }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Qualification</label>
                            <span class="form-control">{{ $visa->qualification }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Profession</label>
                            <span class="form-control">{{ $visa->profession }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Travel Purpose</label>
                            <span class="form-control">{{ $visa->travel_purpose }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Musaned No</label>
                            <span class="form-control">{{ $visa->musaned_no }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Wakala No</label>
                            <span class="form-control">{{ $visa->wakala_no }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Group No</label>
                            <span class="form-control">{{ $visa->group_no }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Copile Name Arabic</label>
                            <span class="form-control">{{ $visa->copile_name_arabic }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Comment</label>
                            <span class="form-control">{{ $visa->comment }}</span>
                        </div>
                    </div>
                    <a href="{{ route('visas.index') }}">
                        <button class="btn btn-secondary">Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
