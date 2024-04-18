<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-content-end mb-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storeGenderFormModal">
                            Gender Create
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
                            @foreach ($genders as $gender)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $gender->title }}</td>
                                    <td>
                                        <a href="{{ route('genders.edit', $gender) }}" title="Edit"
                                            class="text-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" title="Delete" class="mx-2"
                                            style="color: red"
                                            onclick="event.preventDefault(); document.getElementById('gender-destroy{{ $gender->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="gender-destroy{{ $gender->id }}"
                                            action="{{ route('genders.destroy', $gender) }}" method="POST"
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

    @include('includes.modals.forms.gender')
</x-app-layout>
