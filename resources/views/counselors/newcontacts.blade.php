@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')

    <div class="container h-100">

        <div class="row h-100 justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border:none">
                    <div class="row">
                        <div class="col-12"><h2 class="d-flex justify-content-center">
                                List of New Contacts by Counselor </h2></div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class=" form-group">

                            <div class="row form-group">
                                <div class="col-lg-2 col-md-2" ></div>
                                <div class="col-lg-1 col-sm-12 col-xs-12" style="padding-right: 0!important; ">

                                    <label for="slecteddate" class=" col-form-label" style="padding-right: 0!important; ">from
                                        date :</label>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-xs-12" style="padding-left: 0!important;">
                                    <input type="date" class="form-control" id="slecteddate1" value="{{$selectedDate}}">

                                </div>

                                <div class="col-lg-1 col-sm-12 col-xs-12" style="padding-right: 0!important; ">

                                    <label for="slecteddate" class=" col-form-label" style="padding-right: 0!important;">to
                                        date :</label>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-xs-12" style="padding-left: 0!important;">
                                    <input type="date" class="form-control" id="slecteddate2" value="{{$selectedDate}}">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-2" ></div>


                                <label for="counsellor_id" class="col-lg-1 col-md-2 control-label"
                                       style="margin-top: 10px;  padding-left: 0!important; ;padding-right: 0">Counselors</label>
                                <div class="col-lg-3 col-md-5" style=" margin-top: 5px;">
                                    <select class="form-control" id="counsellor_id" name="counsellor_id"
                                            required="true">
                                        <option value="" style="display: none;" disabled selected>Select a
                                            counsulor...
                                        </option>
                                        @foreach ($counselors as  $counsulor)
                                            <option value="{{ $counsulor->id }}">
                                                {{ $counsulor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12" style=" margin-top: 3px;">
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


                var selectedcounsulor = $("#counsellor_id").val();
                var selecteddate1 = $("#slecteddate1").val();
                var selecteddate2 = $("#slecteddate2").val();

                if (selectedcounsulor == null) {
                    alert ("You didn't select any Counsulor ")
                }
                else {


                    searchurl = "{{route('counselor.show.new.contacts')}}"
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: searchurl,

                        data: {
                            "_token": "{{ csrf_token() }}",
                            "selectedcounsulor": selectedcounsulor,
                            "selecteddate1":selecteddate1,
                            "selecteddate2":selecteddate2

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
