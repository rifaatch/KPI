@extends('layouts.app')

@section('header_styles')

    <style>
        .passed{
            background-color: rgba(52, 149, 227, 0.66);
           border: rgba(52, 149, 227, 0.66) solid 1px;
            border-radius: 5px;
            min-height: 35px;
            padding-top: 5px;

        }


        .notpassed {
            background-color: rgba(227, 52, 47, 0.46);
            border: rgba(227, 52, 47, 0.46) solid 1px ;
            border-radius: 5px;
            min-height: 35px;
            padding-top: 5px;

        }


    </style>

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
                        <div class="row" >
                            <div class="col-12"><h2 class="d-flex justify-content-center"> kpi Indicator between 2 dates </h2></div>
                        </div>

                        <div class="row form-group">

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
                            <div class="col-lg-1 col-sm-12 col-xs-12">
                                <button type="button" class="btn btn-info" style="margin-top: 3px " id="getdata"
                                        name="getdata">Submit
                                </button>
                            </div>
                        </div>
                        <div id="htmdata">


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
                selecteddate1 = $("#slecteddate1").val();
                selecteddate2 = $("#slecteddate2").val();
                searchurl = "{{route('kpi_indicators.leads.btw2dates.result')}}"
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: searchurl,

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "selecteddate1": selecteddate1,
                        "selecteddate2": selecteddate2,

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
