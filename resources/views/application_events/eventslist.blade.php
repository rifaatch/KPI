@extends('layouts.app')
<style>
    .cell {
        border-top: solid 1px;
        border-bottom: solid 1px;
        border-left: solid 1px;
        border-right: solid 1px;
        border-color: #dfdfdf !important;
    }


</style>
@section('header_styles')

@endsection

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            @if(!empty($successMsg))
                <div class="alert alert-success"><h4> {{ $successMsg }} </h4></div>
            @endif
            <h6 class="col-lg-6 col-md-6 col-sm-12 col-12"> Application Zoho id :{{$application->zoho_id}} </h6>
            <h6 class="col-lg-6 col-md-6 col-sm-12 col-12"> Created at :{{$application->created_at}} </h6>
            <h4 class="col-lg-6 col-md-6 col-sm-12 col-12 text-info"> Client:{{$application->client_name}} </h4>
            <h4 class="col-lg-6 col-md-6 col-sm-12 col-12"> Employee:{{$application->employee->name}} </h4>

            <h5 class="col-lg-12 col-sm-12 col-12" style="margin: 10px 0 15px 25px"> {{$application->description}} </h5>

            @if ( $appEvents->total() == 0 )
                <div class="alert alert-danger"><h3> Zero application Event </h3></div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <span class="float-right text-info h4">   Total application event : {{$appEvents->total()}}</span>
                        </div>
                    </div>


                    @foreach ( $appEvents as $applicationEvent )

                        <div class="row  ">
                            <span class="col-lg-3 col-md-6 col-sm-12 col-xs-12">{{$applicationEvent->created_at}}</span>
                        </div>
                        <div class="row  ">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 "><span
                                        class="">Event Zoho id : &nbsp;</span> {{$applicationEvent->action_id}}</div>

                            <div class="col-lg-2  col-sm-12 col-xs-12 "></div>
                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12   ">
                                <span class="">Action : &nbsp;</span> {{$applicationEvent->action_name}}
                            </div>


                        </div>

                        <div class="row  ">
                            <div class="col-lg-4 col-sm-12 col-xs-12 "><span
                                        class="">Employee : &nbsp;</span> {{$applicationEvent->employee->name}}</div>


                        </div>

                        <div class="row">
                            <div class="col-12" style="margin: 15px">
                                {{$application->description}} </div>
                        </div>

                        <div class="row">
                            <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
                            </div>
                        </div>

                    @endforeach
                    <div class="float-right">   {{ $appEvents->links() }} </div>
                    @endif
                </div>
        </div>
    </div>

@endsection


@section('footer_scripts')




@endsection
