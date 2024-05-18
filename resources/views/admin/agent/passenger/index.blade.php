<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-content-end mb-2">
                        <a href="{{ route('passenger-agents.create') }}">
                            <button class="btn btn-primary">
                                Passenger Agent Create
                            </button>
                        </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passenger_agents as $passenger_agent)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $passenger_agent->name }}</td>
                                    <td>
                                        <a href="{{ route('passenger-agents.show', $passenger_agent) }}" title="show" class="mr-2 text-success">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('passenger-agents.edit', $passenger_agent) }}" title="Edit" class="mr-2 text-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" title="Delete" style="color: red"
                                            onclick="event.preventDefault(); document.getElementById('passenger-agent-destroy{{ $passenger_agent->id }}').submit();">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <form id="passenger-agent-destroy{{ $passenger_agent->id }}"
                                            action="{{ route('passenger-agents.destroy', $passenger_agent) }}" method="POST" class="d-none">
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
