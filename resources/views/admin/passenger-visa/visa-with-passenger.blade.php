<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('visa.with.passenger') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="passenger_id" class="form-label">Passenger</label>
                                <select name="passenger_id" id="passenger_id"
                                    class="form-control @error('passenger_id') is-invalid @enderror" required>
                                    <option value="">Select one</option>
                                    @foreach ($passengers as $passenger)
                                        <option value="{{ $passenger->id }}">
                                            {{ $passenger->passenger_name }}</option>
                                    @endforeach
                                </select>
                                @error('passenger_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="visa_info_id" class="form-label">Visa</label>
                                <select name="visa_info_id" id="visa_info_id"
                                    class="form-control @error('visa_info_id') is-invalid @enderror" required>
                                    <option value="">Select one</option>
                                    @foreach ($visas as $visa)
                                        <option value="{{ $visa->id }}">
                                            {{ $visa->visa_no }}</option>
                                    @endforeach
                                </select>
                                @error('visa_info_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-1">
                                <label for="visa" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </div>

                    </form>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Passenger Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Visa No</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($passenger_visas as $passenger_visa)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $passenger_visa->passenger->passenger_name }}</td>
                                <td>{{ $passenger_visa->passenger->contact_no }}</td>
                                <td>{{ $passenger_visa->visa_info->visa_no }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
