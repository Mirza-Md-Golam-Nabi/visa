<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('applications.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div>@include('includes.application.personal-info')</div>
                        <div class="mt-5">@include('includes.application.passport-info')</div>
                        <div class="mt-5">@include('includes.application.visa-info')</div>
                        <div class="mt-5">@include('includes.application.legal-document')</div>
                        <div class="mt-5">@include('includes.application.other-info')</div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
