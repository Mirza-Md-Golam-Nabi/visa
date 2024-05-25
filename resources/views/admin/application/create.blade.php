<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('applications.store') }}" method="POST" class="row g-3">
                        @csrf
                        @include('includes.application.passenger')
                        <div class="py-2">
                            <hr>
                        </div>
                        @include('includes.application.passport')
                        <div class="py-2">
                            <hr>
                        </div>
                        @include('includes.application.visa')
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $('#division_id').change(function() {
                var division_id = $('#division_id').val();
                if (division_id != '') {
                    $.ajax({
                        url: "{{ route('general.fetch.district') }}?division_id=" + division_id,
                        method: 'GET',
                        success: function(data) {
                            $('#district_id').html(data);
                        }
                    });
                }
            });
        });
    </script>

</x-app-layout>
