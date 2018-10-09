@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card" style="border:none">
                <div class="card-header">Welcome to Edugade KPI</div>

                <div class="card-body"  >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row" >

              <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route('leads.lead.byoffice')}}"  > <br>  <i class="fas fa-building"></i>
                       New leads by office </a></div>
                        <div class="col-lg-3 col-md-3 col-12  box" ><br> 123155 </div>

                     <div class="col-lg-3 col-md-3 col-12  box" ><br> 515 hj bj </div>



                    </div>


                </div>
            </div>
        </div>
    </div></div>
</div>
@endsection
