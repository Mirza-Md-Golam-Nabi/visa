<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <span class="form-control">{{ $visa->country }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Passenger Agent Name</label>
                            <span class="form-control">{{ $visa->passenger_agent->name }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Service Agent Name</label>
                            <span class="form-control">{{ $visa->service_agent->name }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Visa No</label>
                            <span class="form-control">{{ $visa->visa_no }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Category</label>
                            <span class="form-control">{{ $visa->category->description() }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Quantity</label>
                            <span class="form-control">{{ $visa->quantity }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Sponsor ID</label>
                            <span class="form-control">{{ $visa->sponsor_id }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Group No</label>
                            <span class="form-control">{{ $visa->group_no }}</span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Copile Name Arabic</label>
                            <span class="form-control">{{ $visa->copile_name_arabic }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Comment</label>
                            <span class="form-control">{{ $visa->comment }}</span>
                        </div>
                    </div>
                    <a href="{{ route('visas.index') }}">
                        <button class="btn btn-secondary">Back</button>
                    </a>
                    <a href="{{ route('visas.edit', $visa) }}" title="Edit" class="mr-2 text-primary">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
