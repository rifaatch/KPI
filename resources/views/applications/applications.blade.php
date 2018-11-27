@if ( $applications->total() == 0  )
    <div class="alert alert-danger "> <h3> Zero Applications  </h3></div>

@else
    <div class="container">
        <div class="row  ">
            <div class="col-lg-12 col-sm-12 col-xs-12 " style="margin-bottom: 15px" >
      <h4>  <span class="float-right " >   Total Applications : {{$applications->total()}}</span></h4>
            </div>  </div>
        @foreach( $applications as $application)

            <div class="row  ">
                <span class="col-lg-3 col-sm-12 col-xs-12">{{$application->created_at}}</span>
                <div class="col-lg-3 col-sm-12 col-xs-12 " >  <span class="">Duration : &nbsp;</span>    {{duration( $application->created_at )}}</div>
                <div class="col-lg-3 col-sm-12 col-xs-12 " >  <span class="">Counsulor : &nbsp;</span>    {{$application->counsulor->name}}</div>

                <div class="col-lg-3 col-sm-12 col-xs-12"> <span class="">Admission: &nbsp;</span> {{$application->admission->name}}</div>
            </div>
            <div class="row  ">
                <span class="col-lg-3 col-sm-12 col-xs-12"> <span class="">Source: &nbsp;</span> {{$application->source}}</span>
                <span class="col-lg-9 col-sm-12 col-xs-12"> <span class="">Source details: &nbsp;</span> {{$application->source_details}}</span>
            </div>

            <div class="row  ">
              <div class="col-lg-3 col-sm-12 col-xs-12 " >  <span class="">Zoho id : &nbsp;</span>    {{$application->zoho_id}}</div>

                <div class="col-lg-3 col-sm-12 col-xs-12 " >   <span class="">Status : &nbsp;</span>    {{$application->status}} </div>
                <div class="col-lg-3 col-sm-12 col-xs-12   ">
                    <span class="">Action : &nbsp;</span>    {{$application->action}}
                </div>

                <div class="col-lg-3 col-sm-12 col-xs-12 " >
                    <a href="{{route('appEvents.appEvent.list' , $application->id)}}" class="btn btn-info"> Applications events</a>

                </div>
            </div>

            <div class="row  ">
                <div class="col-lg-3 col-sm-12 col-xs-12 "  style=" margin: 7px 0 7px 0">
                <span class="text-info h4" style="padding: 0  5px 0 5px">  {{$application->client_name}}</span>
                </div>
            </div>



            <div class="row">
                <div class="col-12" style="margin: 15px">
                {{$application->description}} </div></div>

            <div class="row">
                <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
                </div>
            </div>

            @endforeach
        <div class="float-right" >   {{ $applications->links() }} </div>
    </div>

@endif
