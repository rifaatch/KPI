@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
    @php ( $office_id= $selectedOffice->id )
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

                        <div class=" form-group">
                            <div class=" row form-group " >
                                <label for="office_id" class="col-md-1 control-label"  style="padding-left: 0!important; ;padding-right: 0" >Office name</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="office_id" name="office_id" required="true">
                                        <option value="" style="display: none;" {{ $office_id == '' ? 'selected' : '' }} disabled selected>Enter office here...</option>
                                        @foreach ($offices as $key => $office)
                                            <option value="{{ $key }}" {{ $office_id == $key ? 'selected' : '' }}>
                                                {{ $office }}
                                            </option>
                                        @endforeach
                                    </select>

                                    {!! $errors->first('office_id', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row" >
                            <div class="col-lg-1 col-sm-12 col-xs-12" style="padding-right: 0!important; ">

                                <label for="slecteddate" class=" col-form-label" style="padding-right: 0!important; ">from
                                    date :</label>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12" style="padding-left: 0!important;">
                                <input type="date" class="form-control" id="slecteddate1" value="{{$date1}}">

                            </div>

                            <div class="col-lg-1 col-sm-12 col-xs-12" style="padding-right: 0!important; ">

                                <label for="slecteddate" class=" col-form-label" style="padding-right: 0!important;">to
                                    date :</label>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12" style="padding-left: 0!important;">
                                <input type="date" class="form-control" id="slecteddate2" value="{{$date2}}">

                            </div>
                            <div class="col-lg-1 col-sm-12 col-xs-12">
                                <button type="button" class="btn btn-info" style="margin-top: 3px " id="getdata"
                                        name="getdata">Submit
                                </button>
                            </div>
                        </div>
                        <div id="htmdata">
                        @if (  $selectedOffice && $date1<>null && $date2 <> null )

                            @php (  $employees=$selectedOffice->employee  )
                            @include ('contacts.listofcontactsbyemployeesbydates' ,[$employees , $date1, $date2])

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
                officeid=$("#office_id").val();
                searchurl = "{{route('contacts.byemployees.dates')}}"
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: searchurl,

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "officeid":officeid,
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
