@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border:none">
                    <div class="card-header">Welcome to Edugade KPI</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-12  box"><a href="{{route('LeadsStats')}}"> <br>
                                    <i class="fas fa-sort-amount-up"></i>
                                    Leads Stats </a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><a
                                        href="{{route('applications-stats')}}"> <br>
                                    <i class="far fa-clipboard"></i> Applications Stats </a></div>

                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('contacts-stats')}}">
                                    <i class="fas fa-user-tie"></i> Contacts Stats</a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('counsellors-stats')}}">
                                    <i class="fas fa-user-tie"></i></i> Counsellors  Stats</a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('admission-stats')}}">
                                    <i class="fas fa-building"></i>   Admission Officer Stats</a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('management-pages')}}">
                                    Management Pages</a></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
