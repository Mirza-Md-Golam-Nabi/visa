<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-content-end mb-2">
                        <a href="{{ route('agents.create') }}">
                            <button class="btn btn-primary">
                                Agent Create
                            </button>
                        </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Agent Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $agent)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $agent->name }}</td>
                                    <td>{{ $agent->agent_type->description() }}</td>
                                    <td>
                                        <a href="{{ route('agents.show', $agent) }}" title="show"
                                            class="mr-2 text-success">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('agents.edit', $agent) }}" title="Edit"
                                            class="mr-2 text-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" title="Delete" style="color: red"
                                            onclick="event.preventDefault(); document.getElementById('agent-destroy{{ $agent->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="agent-destroy{{ $agent->id }}"
                                            action="{{ route('agents.destroy', $agent) }}" method="POST"
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
