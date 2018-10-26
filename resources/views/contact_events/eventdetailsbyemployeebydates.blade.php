@extends('layouts.app')

@section('header_styles')
<style>
    .cell {
        border-top: solid 1px;
        border-bottom: solid 1px;
        border-left: solid 1px;
        border-right: solid 1px;
        border-color:#dfdfdf!important;
    }


</style>
@endsection

@section('content')
    @php ( $employee_id= $selectedEmployee->id )
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
                                <div class="col-12">
                                    <h2 class="d-flex justify-content-center">
                                        List of Contact Events between 2 dates done by Employee:
                                    </h2></div>
                            </div>
                        <div class=" form-group">
                           <div class=" row form-group ">
                                <label for="employee_id" class="col-md-2 control-label"
                                       style="padding: 5px 5px 5px 5px!important; ">
                                    <span  class=""> Employee :</span></label>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding: 5px 5px 5px 5px!important; ">
                                    <select class="form-control" id="employee_id" name="employee_id" required="true">
                                        <option value="" style="display: none;"
                                                {{ $employee_id == '' ? 'selected' : '' }} disabled selected>Enter Employee Name here...
                                        </option>
                                        @foreach ( $employees as $key => $employee )
                                            <option value="{{ $key }}" {{ $employee_id == $key ? 'selected' : '' }}>
                                                {{ $employee }}
                                            </option>
                                        @endforeach
                                    </select>

                                    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
                                </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding: 5px 5px 5px 5px!important; ">
                                <input type="text" class="form-control" id="filterby" placeholder="Filter by action name ...">

                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12" style="padding-right: 0!important; ">

                                    <label for="slecteddate1" class=" col-form-label"
                                           style="padding-right: 0!important; ">from
                                        date :</label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-left: 0!important;">
                                    <input type="date" class="form-control" id="slecteddate1" value="{{$date1}}">

                                </div>

                                <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12" style="padding-right: 0!important; ">

                                    <label for="slecteddate2" class=" col-form-label"
                                           style="padding-right: 0!important;">to
                                        date :</label>
                                </div>
                                <div class="col-lg-3 col-md-3  col-sm-12 col-xs-12" style="padding-left: 0!important;">
                                    <input type="date" class="form-control" id="slecteddate2" value="{{$date2}}">

                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
                                    <button type="button" class="btn btn-info" style="margin-top: 3px " id="getdata"
                                            name="getdata">Submit
                                    </button>
                                </div>
                            </div>
                            <div id="htmdata">
                                @if (  $selectedEmployee && $date1<>null && $date2 <> null )


                                    @include ('contact_events.listofevents' ,[ $contactEvents ])

                                @endif
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
                selecteddate1 = $("#slecteddate1").val();
                selecteddate2 = $("#slecteddate2").val();
                employeeid = $("#employee_id").val();
                filterby=$("#filterby").val();
                searchurl = "{{route('contactEvents.btwdates.employee.details.submit')}}"
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: searchurl,

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "employeeid": employeeid,
                        "selecteddate1": selecteddate1,
                        "selecteddate2": selecteddate2,
                        "filterby":filterby,

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
