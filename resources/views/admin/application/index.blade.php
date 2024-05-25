<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-content-end mb-2">
                        <a href="{{ route('applications.create') }}">
                            <button class="btn btn-primary">
                                Applicaiton Create
                            </button>
                        </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Passenger Name</th>
                                <th scope="col">Passport ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $application->passenger_name }}</td>
                                    <td>{{ $application->passport->passport_no }}</td>
                                    <td>
                                        <a href="{{ route('applications.edit', $application) }}" title="Print"
                                            class="text-primary">
                                            <i class="bi bi-printer"></i>
                                        </a>
                                        <a href="{{ route('applications.edit', $application) }}" title="Edit"
                                            class="text-primary mx-2">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" title="Delete" style="color: red"
                                            onclick="event.preventDefault(); document.getElementById('religion-destroy{{ $application->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="religion-destroy{{ $application->id }}"
                                            action="{{ route('applications.destroy', $application) }}" method="POST"
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
