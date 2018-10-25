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
                <div class="alert alert-success"> <h3> {{ $successMsg }} </h3></div>
            @endif
            @include('applications.applications',$applications)
                  </div>
    </div>

@endsection


@section('footer_scripts')




@endsection
