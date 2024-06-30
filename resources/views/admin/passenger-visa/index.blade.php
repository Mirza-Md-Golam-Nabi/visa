<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Passenger Name</th>
                                <th scope="col">Contact No</th>
                                <th scope="col">Visa No</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passenger_visas as $passenger_visa)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $passenger_visa->passenger->passenger_name }}</td>
                                    <td>{{ $passenger_visa->passenger->contact_no }}</td>
                                    <td>{{ $passenger_visa->visa_info->visa_no }}</td>
                                    <td>
                                        <a href="{{ route('passenger-visas.create', ['passenger_visa' => $passenger_visa]) }}"
                                            title="Print" class="text-success">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                        <a href="{{ route('passenger-visas.edit', $passenger_visa) }}" title="Edit"
                                            class="text-primary mx-2">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" title="Delete" style="color: red"
                                            onclick="event.preventDefault(); document.getElementById('passenger-visa-destroy{{ $passenger_visa->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="passenger-visa-destroy{{ $passenger_visa->id }}"
                                            action="{{ route('passenger-visas.destroy', $passenger_visa) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
