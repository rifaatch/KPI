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
                <h6 class="col-lg-4 col-md-6 col-sm-12 col-12"> Contact Zoho id :{{$contact->zoho_id}} </h6>
                <h6 class="col-lg-4 col-md-6 col-sm-12 col-12"> Created at :{{$contact->created_at}} </h6>
                <h6 class="col-lg-4 col-md-6 col-sm-12 col-12"> Duration : {{ duration( $contact->created_at ) }} </h6>

                <h6 class="col-lg-4 col-md-6 col-sm-12 col-12"> Counsulor : {{$contact->counsulor->name}} </h6>
                <h6 class="col-lg-4 col-md-6 col-sm-12 col-12"> Admission  :{{$contact->admission->name}} </h6>
                <h6 class="col-lg-4 col-md-6 col-sm-12 col-12"> Employee:{{$contact->employee->name}} </h6>

                <h6 class="col-lg-4 col-md-6 col-sm-12 col-12"> Source  :{{$contact->source}} </h6>
                <h6 class="col-lg-8 col-md-6 col-sm-12 col-12"> Source details:{{$contact->source_details}} </h6>

                <h5 class="col-lg-12 col-md-12 col-sm-12 col-12 "> Status:{{$contact->status}} </h5>
                <h4 class="col-lg-12 col-md-12 col-sm-12 col-12 text-info"> Client:{{$contact->client_name}} </h4>


            <h5 class="col-lg-12 col-sm-12 col-12" style="margin: 10px 0 15px 25px"> {{$contact->description}} </h5>

            @if ( $contactEvents->total() == 0 )
                <div class="alert alert-danger"><h3> Zero Contact Events </h3></div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <span class="float-right text-info h4">   Total Contact events : {{$contactEvents->total()}}</span>
                        </div>
                    </div>


                    @foreach ( $contactEvents as $contactEvent )

                        <div class="row  ">
                            <span class="col-lg-3 col-md-6 col-sm-12 col-xs-12">{{$contactEvent->created_at}}</span>
                        </div>
                        <div class="row  ">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 "><span
                                        class="">Event Zoho id : &nbsp;</span> {{$contactEvent->action_id}}</div>

                            <div class="col-lg-2  col-sm-12 col-xs-12 "></div>
                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12   ">
                                <span class="">Action : &nbsp;</span> {{$contactEvent->action_name}}
                            </div>


                        </div>

                        <div class="row  ">
                            <div class="col-lg-4 col-sm-12 col-xs-12 "><span
                                        class="">Employee : &nbsp;</span> {{$contactEvent->employee->name}}</div>


                        </div>

                        <div class="row">
                            <div class="col-12" style="margin: 15px">
                                {{$contactEvent->description}} </div>
                        </div>

                        <div class="row">
                            <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
                            </div>
                        </div>

                    @endforeach
                    <div class="float-right">   {{ $contactEvents->links() }} </div>
                    @endif
                </div>
        </div>
    </div>

@endsection


@section('footer_scripts')




@endsection
