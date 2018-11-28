@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')

    <div class="container h-100">

        <div class="row h-100 justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border:none">
                    <div class="row">
                        <div class="col-12"><h2 class="d-flex justify-content-center">Application filter
                            By Status and Admission </h2></div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class=" form-group">

                            <div class="row">
                                <div class="col-lg-2 " style=" margin-top: 5px;">

                                </div>


                                <div class="col-lg-3 col-md-4" style=" margin-top: 5px;">
                                    <label for="status" class=" control-label"
                                           style="margin-top: 10px;  padding-left: 0!important; ;padding-right: 0">Status:</label>
                                    <select class="form-control" id="status" name="status" required="true">
                                        <option value="" style="display: none;" disabled selected>Select a status...
                                        </option>
                                        @foreach ($statusList as $key => $status)
                                            <option value="{{ $status }}">
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>





                                <div class="col-lg-3 col-md-4" style=" margin-top: 5px;">
                                    <label for="admission_id" class=" control-label"
                                           style=" margin-top: 10px; padding-left: 0!important; ;padding-right: 0">Admissions:</label>
                                    <select class="form-control" id="admission_id" name="admission_id" required="true">
                                        <option value="" style="display: none;" disabled selected>Select an
                                            admission...
                                        </option>
                                        <option value="0">All</option>
                                        @foreach ($admissions as  $admission)
                                            <option value="{{ $admission->id }}">
                                                {{ $admission->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12" style=" margin-top: 3px;">
                                    <label for="getdata" class=" control-label"
                                           style=" margin-top: 10px; padding-left: 0!important; ;padding-right: 0">&nbsp;&nbsp;</label>
                                    <button type="button" class="btn btn-info" style="margin-top: 3px " id="getdata"
                                            name="getdata">Submit
                                    </button>
                                </div>

                            </div>
                            <div id="htmdata" style="margin-top: 15px">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('footer_scripts')

    <script>
        $(document).ready(function () {
            $("#getdata").click(function () {

                var selectedStatus = $("#status").val();
                var selectedAdmission = $("#admission_id").val();



                if ( selectedStatus == null) {
                    alert ("You didn't select any Status ")

                }
               else if (selectedAdmission == null) {

                  alert ("You didn't select any Admission ")
                }

                else {


                    searchurl = "{{route('admissions.application.status.getdata')}}"
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: searchurl,

                        data: {
                            "_token": "{{ csrf_token() }}",
                            "selectedStatus": selectedStatus,
                            "selectedAdmission": selectedAdmission,

                        },
                        success: function (response) {
                            $('#htmdata').html(response);


                        },
                        error: function (response) {
                            console.log('Error' + response);

                        }
                    })
                }

            })

        });
    </script>



@endsection
