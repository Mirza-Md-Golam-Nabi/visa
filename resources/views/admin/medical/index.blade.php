<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-content-end mb-2">
                        <a href="{{ route('medicals.create') }}">
                            <button class="btn btn-primary">
                                Medical Create
                            </button>
                        </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Job ID</th>
                                <th scope="col">Passenger Name</th>
                                <th scope="col">Medical Center</th>
                                <th scope="col">MOFA ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicals as $medical)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $medical->id }}</td>
                                    <td>{{ $medical->passenger->passenger_name }}</td>
                                    <td>{{ $medical->medical_center->name }}</td>
                                    <td>{{ $medical->mofa_number }}</td>
                                    <td>
                                        <a href="{{ route('medicals.show', $medical) }}" title="show"
                                            class="mr-2 text-success">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('medicals.edit', $medical) }}" title="Edit"
                                            class="mr-2 text-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" title="Delete" style="color: red"
                                            onclick="event.preventDefault(); document.getElementById('medical-destroy{{ $medical->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="medical-destroy{{ $medical->id }}"
                                            action="{{ route('medicals.destroy', $medical) }}" method="POST"
                                            class="d-none">
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
