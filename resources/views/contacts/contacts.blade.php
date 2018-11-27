@if ( $contacts->total() == 0  )
    <div class="alert alert-danger "> <h3> Zero Contacts  </h3></div>

@else
    <div class="container">
        <div class="row  ">
            <div class="col-lg-12 col-sm-12 col-xs-12 " style="margin-bottom: 15px" >
      <h4>  <span class="float-right " >   Total Contacts : {{$contacts->total()}}</span></h4>
            </div>  </div>
        @foreach( $contacts as $contact)

            <div class="row  ">
                <span class="col-lg-3 col-md-6 col-sm-12 col-xs-12">{{$contact->created_at}}</span>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 " >  <span class="">Duration : &nbsp;</span>    {{duration( $contact->created_at )}}</div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 " >  <span class="">Counsulor : &nbsp;</span>    {{$contact->counsulor->name}}</div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12"> <span class="">Admission: &nbsp;</span> {{$contact->admission->name}}</div>



            </div>
        <div class="row" >
            <span class="col-lg-3  col-md-6 col-sm-12 col-xs-12"> <span class="">Source: &nbsp;</span> {{$contact->source}}</span>
            <span class="col-lg-9  col-md-6 col-sm-12 col-xs-12"> <span class="">Source details: &nbsp;</span> {{$contact->source_details}}</span>

        </div>
            <div class="row  ">

              <div class="col-lg-3  col-md-6 col-sm-12 col-xs-12 " >  <span class="">Zoho id : &nbsp;</span>    {{$contact->zoho_id}}</div>
                <div class="col-lg-3  col-md-6 col-sm-12 col-xs-12 " >   <span class="">Status : &nbsp;</span>    {{$contact->status}} </div>
                <div class="col-lg-3  col-md-6 col-sm-12 col-xs-12   ">
                    <span class="">Action : &nbsp;</span>    {{$contact->action}}
                </div>

                <div class="col-lg-3 col-sm-12 col-xs-12 " >
                    <a href="{{route('contactEvents.contactEvent.list' , $contact->id)}}" class="btn btn-info"> Contact events</a>

                </div>
            </div>

            <div class="row  ">
                <div class="col-lg-3 col-sm-12 col-xs-12 "  style=" margin: 7px 0 7px 0">
                <span class="text-info h4" style="padding: 0  5px 0 5px">  {{$contact->client_name}}</span>
                </div>
            </div>



            <div class="row">
                <div class="col-12" style="margin: 15px">
                {{$contact->description}} </div></div>

            <div class="row">
                <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
                </div>
            </div>

            @endforeach
        <div class="float-right" >   {{ $contacts->links() }} </div>
    </div>

@endif
