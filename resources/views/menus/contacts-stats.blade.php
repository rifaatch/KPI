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

                            <div class="col-lg-3 col-md-3 col-12  box"><a href="{{route('contact.byofficebtw2dates')}}"> <br>
                                    <i class="fas fa-building"></i>
                                    New Contacts by Offices between 2 dates </a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><a
                                        href="{{route('contactEvents.list.btwdates.offices')}}"> <br>
                                    Contacts Events Between 2 date </a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('kpi_indicators.leads.btw2dates')}}">
                                    <i class="fas fa-chart-line"></i>   KPI indicator Between 2 dates</a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('contacts.search')}}"><i
                                            class="fas fa-search"></i>Contacts Search</a></div>


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
