<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-content-end mb-2">
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#storeMaritalStatusFormModal">
                            Marital Status Create
                        </button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marital_statuses as $marital_status)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $marital_status->title }}</td>
                                    <td>
                                        <a href="{{ route('marital-statuses.edit', $marital_status) }}" title="Edit"
                                            class="text-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" title="Delete" class="mx-2" style="color: red"
                                            onclick="event.preventDefault(); document.getElementById('marital-status-destroy{{ $marital_status->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="marital-status-destroy{{ $marital_status->id }}"
                                            action="{{ route('marital-statuses.destroy', $marital_status) }}"
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

    @include('includes.modals.forms.marital-status')
</x-app-layout>
