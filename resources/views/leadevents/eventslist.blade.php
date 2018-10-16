@extends('layouts.app')
<style>
    .cell {
        border-top: solid 1px;
        border-bottom: solid 1px;
        border-left: solid 1px;
        border-right: solid 1px;
        border-color:#dfdfdf!important;
    }



</style>
@section('header_styles')

@endsection

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            @if(!empty($successMsg))
                <div class="alert alert-success"> <h4> {{ $successMsg }} </h4></div>
            @endif
            <h4 class="col-lg-4 col-sm-12 col-12"> Lead Zoho id :{{$lead->zoho_id}} </h4>
               <br>
          <h4 class="col-lg-4 col-sm-12 col-12">   Client name :{{$lead->client_name}} </h4>
                <h4 class="col-lg-4 col-sm-12 col-12">   Employee name :{{$lead->employee->name}} </h4>
                <h4 class="col-lg-4 col-sm-12 col-12">  Created at :{{$lead->created_at}} </h4>
                <h4 class="col-lg-8 col-sm-12 col-12">  Descrption :{{$lead->descrption}} </h4>

                @if ( $leadevents->total() == 0 )
                    <div class="alert alert-danger"> <h3> Zero Event  </h3></div>
                    @else
                    <div class="container">
                        <span >   Total event : {{$leadevents->total()}}</span>
                        <div class="row  ">

                            <div class="col-lg  d-none d-lg-block cell" >
                                <span class="">Zoho id</span>
                            </div>
                            <div class="col-lg d-none d-lg-block cell" >
                                <span class="">Employee </span>

                            </div>
                            <div class="col-lg d-none d-lg-block cell" >
                                <span class="">Event</span>

                            </div>


                            <div class="col-sm col-lg-4 d-none d-lg-block cell " >
                                <span class="">Description</span>

                            </div>
                            <div class="col-lg d-none d-lg-block cell" >
                                <span class="">Created at</span>

                            </div>

                        </div>
                        <div class="row d-xs-none -d-sm-none " style="height: 5px"></div>
                        @foreach ( $leadevents as $leadevent )

                            <div class="row ">

                                <div class="col-sm cell " >
                                    <span class="d-md-none -d-lg-none -d-xl-none">Zoho id :</span> {{$leadevent->action_id}}
                                </div>
                                <div class="col-sm  cell " >
                                    <span class="d-md-none -d-lg-none -d-xl-none"> Employee :</span>
                                    {{$leadevent->employee->name}}
                                </div>
                                <div class="col-sm cell " >
                                    <span class="d-md-none -d-lg-none -d-xl-none">Event:</span>
                                   {{$leadevent->action_name}}
                                </div>

                                <div class="col-sm col-lg-4 cell " >
                                    <span class="d-md-none -d-lg-none -d-xl-none">Description :</span>
                                    {{$leadevent->description}}
                                </div>

                                <div class="col-sm cell " >
                                    <span class="d-md-none -d-lg-none -d-xl-none">Created at:</span>
                                    {{$leadevent->created_at}}
                                </div>

                            </div>
                            <div class="row d-md-none -d-lg-none -d-xl-none" style="height: 15px"></div>
                            <div class="row d-xs-none -d-sm-none " style="height: 5px"></div>

                        @endforeach

                    @endif



        </div>
    </div>
    </div>

@endsection


@section('footer_scripts')




@endsection
