<style>
    .displayinline {
        display: inline;
    }
</style>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
    <ul class="flex nav">
        <li class="nav-item">
            <a class="nav-link displayinline" href="#">Active</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link displayinline dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                aria-expanded="false">Create</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('agents.index') }}">Agent</a></li>
                <li><a class="dropdown-item" href="{{ route('visas.index') }}">Visa</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('applications.index') }}">Applications</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link displayinline" href="#">Link</a>
        </li>
    </ul>
</x-slot>
