@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border:none">
                    <div class="card-header">Welcome to Edugade KPI - Pages Management</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-12  box"><a href="{{route('employees.employee.index')}}"> <br>

                                   Manage Employees</a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><a
                                        href="{{route('offices.office.index')}}"> <br>
                                   Manage Offices </a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('admissions.admissions.index')}}">
                                    Manage Counselors</a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('counselors.leads.status')}}">
                                    Manage Admissions officers</a></div>

                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('kpi_indicators.kpi_indicator.index')}}">
                                   Manage KPI Indicator</a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('holidays.holiday.index')}}">
                                    Manage Hollydays</a></div>

                           
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
