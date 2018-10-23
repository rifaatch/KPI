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

                            <div class="col-lg-3 col-md-3 col-12  box"><a href="{{route('leads.lead.byoffice')}}"> <br>
                                    <i class="fas fa-building"></i>
                                    New leads by office </a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><a
                                        href="{{route('leads.lead.byofficebtw2dates')}}"> <br><i
                                            class="fas fa-building"></i> New leads by Offices between 2 dates </a></div>

                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('LeadEvents.LeadEvent.list.btwdates.offices')}}"> <i
                                            class="fas fa-bolt"></i> Events Between 2 dates</a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('kpi_indicators.leads.btw2dates')}}"> <i
                                            class="fas fa-chart-line"></i> Leads KPI indicator Between 2 dates</a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('leads.pending')}}"> <i
                                            class="fas fa-folder-open"></i> Pending leads</a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('leads.pending')}}"> <i
                                            class="fas fa-folder-open"></i> Pending leads</a></div>

                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('leads.search')}}"><i
                                            class="fas fa-search"></i> Lead Search</a></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
