@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
    <div class="container h-100">

        <div class="row h-100 justify-content-center">


    @if( $employees->count() == 0 )
        <div  class="row" >
            <div class="col-12" >  <h5 class="display-5"> there is <span  class="text-danger" > Zero   </span>  new leads in
                    <span class="text-primary" > {{ $office->office_name}}</span> office  on :  <span class="text-primary">{{$selectedDate}}</span> </h5>
            </div>
        </div>
        @else
        <div  class="row" >
            <div class="col-12" >  <h5 class="display-5"> there is
                    <span  class="text-primary" > {{$office->leads()->whereDate('leads.created_at', '=', $selectedDate)->count()}}  </span>
                    new leads in
                    <span class="text-primary" > {{ $office->office_name}}</span> office  on :  <span class="text-primary">{{$selectedDate}}</span>
                </h5>
            </div>
            @foreach($employees as $employee)


                <div class="col-lg-3 col-md-3 col-12  box" >  <a href=""  >  <i class="fas fa-user-tie" style="margin-right: 4px"></i>



                       {{$employee->name}}</span>

                         @if ( $employee->leads()->whereDate('leads.created_at', '=', $selectedDate)->count() <> 0 )
                             <div style="margin: 4px 0 2px 0 ;  ">
                                 <span class="text-primary" >    {{$employee->leads()->whereDate('leads.created_at', '=', $selectedDate)->count()}} New Leads </span>
                             </div>

                         @else
                             <div style="margin: 4px 0 2px 0 ;">
                                 <span  class="text-danger" >     {{$employee->leads()->whereDate('leads.created_at', '=', $selectedDate)->count()}} New Leads </span>
                             </div>
                         @endif
                    </a>
                </div>
            @endforeach


        </div>
        @endif
        </div>
    </div>

@endsection


 @section('footer_scripts')




@endsection
