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
                             List of Contacts by Counsulor </h2></div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class=" form-group">

                            <div class="row">
                                <div class="col-lg-4 col-md-4" ></div>


                                <label for="counsellor_id" class="col-lg-1 col-md-2 control-label"
                                       style="margin-top: 10px;  padding-left: 0!important; ;padding-right: 0">Counsulors</label>
                                <div class="col-lg-3 col-md-5" style=" margin-top: 5px;">
                                    <select class="form-control" id="counsellor_id" name="counsellor_id"
                                            required="true">
                                        <option value="" style="display: none;" disabled selected>Select a
                                            counsulor...
                                        </option>
                                          @foreach ($counsulors as  $counsulor)
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
                   if (selectedcounsulor == null) {
                    alert ("You didn't select any Counsulor ")
                }
                else {


                    searchurl = "{{route('counselors.counselor.contacts.list')}}"
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: searchurl,

                        data: {
                            "_token": "{{ csrf_token() }}",
                            "selectedcounsulor": selectedcounsulor,

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
