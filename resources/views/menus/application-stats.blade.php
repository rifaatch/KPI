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

                            <div class="col-lg-3 col-md-3 col-12  box"><a href="{{route('application.byofficebtw2dates')}}"> <br>
                                    <i class="fas fa-building"></i>
                                    New Applications by Offices between 2 dates </a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><a
                                        href="{{route('applications.bysources')}}"> <br>
                                    New Applications by Sources between 2 dates </a></div>

                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('appEvents.list.btwdates.offices')}}"> <i
                                            class="fas fa-bolt"></i> Application Events Between 2 dates</a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('applications.filter')}}">
                                    <i class="fas fa-chart-line"></i> Application Filter</a></div>

                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('kpi_indicators.leads.btw2dates')}}">
                                    KPI indicator Between 2 dates</a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('applications.pending')}}"> <i
                                            class="fas fa-folder-open"></i> Pending Applications</a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('applications.search')}}"><i
                                            class="fas fa-search"></i>Application Search</a></div>

                            <div class="col-lg-3 col-md-3 col-12  box">
                                <a href="{{ url('/home') }}"> <br> <i class="fas fa-home"></i>   Home
                                </a></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
