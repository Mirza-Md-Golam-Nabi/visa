<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('visas.update', $visa) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-control @error('country') is-invalid @enderror" name="country"
                                    id="country">
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="passenger_agent_id" class="form-label">Passenger Agent Name</label>
                                <select class="form-control @error('passenger_agent_id') is-invalid @enderror"
                                    name="passenger_agent_id" id="passenger_agent_id">
                                    <option value="">Select One</option>
                                    @foreach ($passenger_agents as $passenger_agent)
                                        @php
                                            $isSelected =
                                                old('passenger_agent_id') == $passenger_agent->id ||
                                                $visa->passenger_agent_id == $passenger_agent->id;
                                        @endphp
                                        <option value="{{ $passenger_agent->id }}" @selected($isSelected)>
                                            {{ $passenger_agent->name }}</option>
                                    @endforeach
                                </select>
                                @error('passenger_agent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="service_agent_id" class="form-label">Service Agent Name</label>
                                <select class="form-control @error('service_agent_id') is-invalid @enderror"
                                    name="service_agent_id" id="service_agent_id">
                                    <option value="">Select One</option>
                                    @foreach ($service_agents as $service_agent)
                                        @php
                                            $isSelected =
                                                old('service_agent_id') == $service_agent->id ||
                                                $visa->service_agent_id == $service_agent->id;
                                        @endphp
                                        <option value="{{ $service_agent->id }}" @selected($isSelected)>
                                            {{ $service_agent->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_agent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="visa_no" class="form-label">Visa No</label>
                                <input type="text" class="form-control @error('visa_no') is-invalid @enderror"
                                    name="visa_no" id="visa_no" value="{{ old('visa_no') ?? $visa->visa_no }}">
                                @error('visa_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control @error('category') is-invalid @enderror" name="category"
                                    id="category">
                                    <option value="">Select One</option>
                                    @foreach ($visa_categories as $category)
                                        @php
                                            $isSelected =
                                                old('category') == $category->value ||
                                                $visa->category->value == $category->value;
                                        @endphp
                                        <option value="{{ $category->value }}" @selected($isSelected)>
                                            {{ $category->description() }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                    name="quantity" id="quantity" value="{{ old('quantity') ?? $visa->quantity }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="sponsor_id" class="form-label">Sponsor ID</label>
                                <input type="text" class="form-control @error('sponsor_id') is-invalid @enderror"
                                    name="sponsor_id" id="sponsor_id"
                                    value="{{ old('sponsor_id') ?? $visa->sponsor_id }}">
                                @error('sponsor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="group_no" class="form-label">Group No</label>
                                <input type="text" class="form-control @error('group_no') is-invalid @enderror"
                                    name="group_no" id="group_no" value="{{ old('group_no') ?? $visa->group_no }}">
                                @error('group_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="copile_name_arabic" class="form-label">Copile Name Arabic</label>
                                <input type="text" style="direction: rtl"
                                    class="form-control @error('copile_name_arabic') is-invalid @enderror"
                                    name="copile_name_arabic" id="copile_name_arabic"
                                    value="{{ old('copile_name_arabic') ?? $visa->copile_name_arabic }}">
                                @error('copile_name_arabic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="comment" class="form-label">Comment</label>
                                <input type="text" class="form-control @error('comment') is-invalid @enderror"
                                    name="comment" id="comment" value="{{ old('comment') ?? $visa->comment }}">
                                @error('comment')
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
