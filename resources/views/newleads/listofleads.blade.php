@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
    <div class="container h-100">

        <div class="row h-100 justify-content-center">

            @if(!empty($successMsg))
                <div class="alert alert-success"> <h3> {{ $successMsg }} </h3></div>
            @endif
            @if ( $leads->count() == 0  )
                    <div class="alert alert-danger"> <h3> Zero lead  </h3></div>

                @else

                @foreach( $leads as $lead)
                        <div class="container">
                            <div class="row">

                                <div class="col-sm" style="border: solid 1px;border-color: #245269">
                                 <span class="d-md-none -d-lg-none -d-xl-none">Zoho id :</span> {{$lead->zoho_id}}
                                </div>
                                <div class="col-sm" style="border: solid 1px;border-color: #245269">
                                    <span class="d-md-none -d-lg-none -d-xl-none">Status id :</span>
                                   {{$lead->status }}
                                </div>
                                <div class="col-sm" style="border: solid 1px;border-color: #245269">
                                    <span class="d-md-none -d-lg-none -d-xl-none">Client Name :</span>
                                 {{$lead->client_name}}
                                </div>
                                <div class="col-sm" style="border: solid 1px;border-color: #245269">
                                    <span class="d-md-none -d-lg-none -d-xl-none">Description :</span>
                                 {{$lead->description}}
                                </div>
                                <div class="col-sm" style="border: solid 1px;border-color: #245269">
                                    <span class="d-md-none -d-lg-none -d-xl-none">Action :</span>
                                  {{$lead->action}}
                                </div>

                            </div>
                            <div class="row d-md-none -d-lg-none -d-xl-none" style="height: 15px"></div>
                            <div class="row d-xs-none -d-sm-none " style="height: 5px"></div>
                        </div>
                    @endforeach
            @endif
        </div>
    </div>

@endsection


@section('footer_scripts')




@endsection
