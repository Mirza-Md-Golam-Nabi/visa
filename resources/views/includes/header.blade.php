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
                <li><a class="dropdown-item" href="{{ route('genders.index') }}">Gender</a></li>
                <li><a class="dropdown-item" href="{{ route('marital-statuses.index') }}">Marital Status</a></li>
                <li><a class="dropdown-item" href="{{ route('religions.index') }}">Religion</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link displayinline" href="#">Link</a>
        </li>
    </ul>
</x-slot>
