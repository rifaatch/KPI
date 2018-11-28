@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border:none">
                    <div class="card-header">Welcome to Edugade KPI - Counsellors  Stats</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-12  box"><a href="{{route('counselors.counselor.contacts')}}"> <br>
                                    <i class="fas fa-book-reader"></i>
                                    List of contacts</a></div>
                            <div class="col-lg-3 col-md-3 col-12  box"><a
                                        href="{{route('counselors.counselor.contacts.total')}}"> <br>
                                    Total Contacts </a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a
                                        href="{{route('counselors.counselor.new.contacts')}}">
                                     New Contacts</a></div>


                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('counselors.leads.status')}}">
                                    Leads by Status</a></div>

                            <div class="col-lg-3 col-md-3 col-12  box"><br> <a href="{{route('counselors.applications.status')}}">
                                    Applications by Status</a></div>


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
