@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border:none">
                    <div class="card-header">Welcome to Edugade KPI -  Admission Officer Stats</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-12  "></div>
                            <div class="col-lg-3 col-md-3 col-12  box">

                                <a href="{{route('admissions.application.status')}}"> <br>

                                    Applications By Status
                                   </a></div>
                            <div class="col-lg-3 col-md-3 col-12  box">
                                <a href="{{ url('/home') }}"> <br>
                                    <i class="fas fa-home"></i>   Home
                                </a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
