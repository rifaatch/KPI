@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
    <div class="container h-100">

        <div class="row h-100 justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border:none">


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row form-group">

                            <div class="col-lg-2 col-sm-12 col-xs-12">

                                <label for="slecteddate" class=" col-form-label" style="padding-right: 0!important; ">Select
                                    date</label>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                <input type="date" class="form-control" id="slecteddate" value="{{$selectedDate}}">

                            </div>
                            <div class="col-lg-1 col-sm-12 col-xs-12">
                                <button type="button" class="btn btn-info" style="margin-top: 3px " id="getdata"
                                        name="getdata">Submit
                                </button>
                            </div>
                        </div>
                        <div id="htmdata">

                            @include ('newleads.listofoffices')

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
                        selecteddate = $("#slecteddate").val();
                        searchurl = "{{route('leads.lead.leadsByOfficeByDate')}}"
                        $.ajax({
                            type: "POST",
                            dataType: "html",
                            url: searchurl,

                            data: {
                                "_token": "{{ csrf_token() }}",
                                "selecteddate": selecteddate,

                            },
                            success: function (response) {
                                $('#htmdata').html(response);


                            },
                            error: function (response) {
                                console.log('Error' + response);

                            }
                        })


                    })
                });
            </script>



@endsection
