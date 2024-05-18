<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('visas.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="passenger_agent_name" class="form-label">Passenger Agent Name</label>
                                <input type="text"
                                    class="form-control @error('passenger_agent_name') is-invalid @enderror"
                                    name="passenger_agent_name" id="passenger_agent_name" value="{{ old('passenger_agent_name') }}">
                                @error('passenger_agent_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="service_agent_name" class="form-label">Service Agent Name</label>
                                <input type="text"
                                    class="form-control @error('service_agent_name') is-invalid @enderror"
                                    name="service_agent_name" id="service_agent_name" value="{{ old('service_agent_name') }}">
                                @error('service_agent_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="visa_no" class="form-label">Visa No</label>
                                <input type="text" class="form-control @error('visa_no') is-invalid @enderror"
                                    name="visa_no" id="visa_no" value="{{ old('visa_no') }}">
                                @error('visa_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                    name="category" id="category" value="{{ old('category') }}">
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                    name="quantity" id="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="visa_date" class="form-label">Visa Date</label>
                                <input type="date" class="form-control @error('visa_date') is-invalid @enderror"
                                    name="visa_date" id="visa_date" value="{{ old('visa_date') }}">
                                @error('visa_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="sponsor_name" class="form-label">Sponsor Name</label>
                                <input type="text" class="form-control @error('sponsor_name') is-invalid @enderror"
                                    name="sponsor_name" id="sponsor_name" value="{{ old('sponsor_name') }}">
                                @error('sponsor_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="sponsor_id" class="form-label">Sponsor ID</label>
                                <input type="text" class="form-control @error('sponsor_id') is-invalid @enderror"
                                    name="sponsor_id" id="sponsor_id" value="{{ old('sponsor_id') }}">
                                @error('sponsor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="visa_issue_place" class="form-label">Visa Issue Place</label>
                                <input type="text"
                                    class="form-control @error('visa_issue_place') is-invalid @enderror"
                                    name="visa_issue_place" id="visa_issue_place" value="{{ old('visa_issue_place') }}">
                                @error('visa_issue_place')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" class="form-control @error('qualification') is-invalid @enderror"
                                    name="qualification" id="qualification" value="{{ old('qualification') }}">
                                @error('qualification')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="profession" class="form-label">Profession</label>
                                <input type="text" class="form-control @error('profession') is-invalid @enderror"
                                    name="profession" id="profession" value="{{ old('profession') }}">
                                @error('profession')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="travel_purpose" class="form-label">Travel Purpose</label>
                                <input type="text"
                                    class="form-control @error('travel_purpose') is-invalid @enderror"
                                    name="travel_purpose" id="travel_purpose" value="{{ old('travel_purpose') }}">
                                @error('travel_purpose')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="musaned_no" class="form-label">Musaned No</label>
                                <input type="text" class="form-control @error('musaned_no') is-invalid @enderror"
                                    name="musaned_no" id="musaned_no" value="{{ old('musaned_no') }}">
                                @error('musaned_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="wakala_no" class="form-label">Wakala No</label>
                                <input type="text" class="form-control @error('wakala_no') is-invalid @enderror"
                                    name="wakala_no" id="wakala_no" value="{{ old('wakala_no') }}">
                                @error('wakala_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="group_no" class="form-label">Group No</label>
                                <input type="text" class="form-control @error('group_no') is-invalid @enderror"
                                    name="group_no" id="group_no" value="{{ old('group_no') }}">
                                @error('group_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="copile_name_arabic" class="form-label">Copile Name Arabic</label>
                                <input type="text"
                                    class="form-control @error('copile_name_arabic') is-invalid @enderror"
                                    name="copile_name_arabic" id="copile_name_arabic" value="{{ old('copile_name_arabic') }}">
                                @error('copile_name_arabic')
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
