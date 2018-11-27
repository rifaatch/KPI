@extends('layouts.app')
<style>

    .div-margin {
        margin-top: 3px;
        margin-bottom: 3px;
        border: 1px solid;
        border-radius: 5px;

    }

    .div-cell {
        padding-top: 5px;

    }

</style>

@section('content')

    <div class="container ">

        <div class="row  ">
            <div class="col-md-12 col-sm-12 col-xs-12">

            <span class="text-center">
                <h4>List of total (Contacts , applications and leads)  by counselor</h4>
            </span>
            </div>

        </div>

        <div class="container h-100">


            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="row text-center    ">
                <div class="col-lg-2 col-md-2"></div>
                <div class="col-lg-3 col-md-3  div-cell d-none d-sm-block "><h5> name</h5></div>
                <div class="col-lg-2 col-md-2  div-cell d-none d-sm-block"><h5> total leads</h5></div>
                <div class="col-lg-2 col-md-2  div-cell d-none d-sm-block"><h5>total applications</h5></div>
                <div class="col-lg-2 col-md-2 div-cell d-none d-sm-block"><h5>total contacts </h5></div>

            </div>
            @foreach( $counselors as $conselor )
                <div class="row text-center div-margin">
                    <div class="col-lg-2 col-md-2"></div>
                    <div class="col-lg-3 col-md-3 col-12 div-cell ">
                        <h5>    <span class=" d-xl-none d-lg-none d-lg-none"  >name :</span>  {{$conselor->name}}</h5></div>
                    <div class="col-lg-2 col-md-2 col-12 div-cell">

                        <h5>
                            <span class=" d-xl-none d-lg-none d-lg-none"  >total leads :</span>
                            {{$conselor->leads->count()}}</h5></div>
                    <div class="col-lg-2 col-md-2 col-12 div-cell"><h5>
                            <span class=" d-xl-none d-lg-none d-lg-none"  >total contacts :</span>
                            {{$conselor->applications->count()}}</h5></div>
                    <div class="col-lg-2 col-md-2 col-12 div-cell"><h5>
                            <span class=" d-xl-none d-lg-none d-lg-none"  >total contats :</span>
                            {{$conselor->contacts->count()}} </h5></div>

                </div>
            @endforeach


        </div>
    </div>
@endsection


