<x-app-layout>
    @include('includes.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('msg')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <label for="job_id" class="form-label"><b>Enter Passenger JOB ID</b></label>
                        </div>
                        <div class="px-4">
                            <input type="text" class="form-control" id="job_id">
                        </div>
                        <div>
                            <span class="btn btn-sm btn-primary" id="find_job_id">Search</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <span class="" id="search_result"></span>
                    </div>
                    <hr>
                    <form action="{{ route('applications.store') }}" method="POST" class="row g-3">
                        @csrf
                        @include('includes.application.readonly.passenger')
                        <div class="py-2">
                            <hr>
                        </div>
                        @include('includes.application.readonly.passport')
                        <div class="py-2">
                            <hr>
                        </div>
                        @include('includes.application.readonly.visa')
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
            $('#find_job_id').click(function() {
                var job_id = $('#job_id').val();
                if (job_id != '') {
                    $.ajax({
                        url: "{{ route('general.fetch.passenger.all.data') }}?job_id=" + job_id,
                        method: 'GET',
                        success: function(data) {
                            if (data) {
                                $('#passenger_id').val(data.id);
                                $('#agent').val(data.passenger_agent.name);
                                $('#passenger_name').val(data.passenger_name);
                                $('#nid_no').val(data.nid_no);
                                $('#gender').val(data.gender_value);
                                $('#dob').val(data.dob);
                                $('#father_name').val(data.father_name);
                                $('#mother_name').val(data.mother_name);
                                $('#spouse_name').val(data.spouse_name);
                                $('#religion').val(data.religion_value);
                                $('#marital_status').val(data.marital_status_value);
                                $('#target_country').val(data.target_country);
                                $('#village_house').val(data.village_house);
                                $('#division_id').val(data.division.name);
                                $('#district_id').val(data.district.name);
                                $('#police_station').val(data.police_station);
                                $('#post_office').val(data.post_office);
                                $('#contact_no').val(data.contact_no);
                                $('#current_status').val(data.current_status_value);
                                $('#emergency_name_contact').val(data.emergency_name_contact);
                                $('#recruiting_agent').val(data.service_agent.name);
                                $('#passenger_picture').val(data.id);
                                $('#previous_passport').val(data.passport.previous_passport);
                                $('#passport_no').val(data.passport.passport_no);
                                $('#passport_type').val(data.passport.passport_type_value);
                                $('#passport_issue_date').val(data.passport
                                .passport_issue_date);
                                $('#passport_issue_place').val(data.passport.passport_issue
                                    .name);
                                $('#passport_expire_date').val(data.passport
                                    .passport_expire_date);
                                $('#passport_picture').val(data.passport);
                            } else {
                                $('#search_result').attr('class', 'text-danger');
                                $('#search_result').text('Job ID does not match.');
                                $('#passenger_id').val("");
                                $('#agent').val("");
                                $('#passenger_name').val("");
                                $('#nid_no').val("");
                                $('#gender').val("");
                                $('#dob').val("");
                                $('#father_name').val("");
                                $('#mother_name').val("");
                                $('#spouse_name').val("");
                                $('#religion').val("");
                                $('#marital_status').val("");
                                $('#target_country').val("");
                                $('#village_house').val("");
                                $('#division_id').val("");
                                $('#district_id').val("");
                                $('#police_station').val("");
                                $('#post_office').val("");
                                $('#contact_no').val("");
                                $('#current_status').val("");
                                $('#emergency_name_contact').val("");
                                $('#recruiting_agent').val("");
                                $('#passenger_picture').val("");
                                $('#previous_passport').val("");
                                $('#passport_no').val("");
                                $('#passport_type').val("");
                                $('#passport_issue_date').val("");
                                $('#passport_issue_place').val("");
                                $('#passport_expire_date').val("");
                                $('#passport_picture').val("");
                            }
                        }
                    });
                }
            });

            $("#job_id").focus(function() {
                $("#search_result").text("");
            });
        });
    </script>

</x-app-layout>
