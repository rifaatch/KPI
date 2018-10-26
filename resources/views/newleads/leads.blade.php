@if ( $leads->total() == 0  )
    <div class="alert alert-danger"><h3> Zero lead </h3></div>

@else
    <div class="container">
        <div class="row  ">
            <div class="col-lg-12 col-sm-12 col-xs-12 " style="margin-bottom: 15px">
                <h4> <span class="float-right text-info " >  Total lead : {{$leads->total()}}</span></h4>
            </div>
        </div>

        @foreach( $leads as $lead)

            <div class="row  ">
                <span class="col-lg-3 col-sm-12 col-xs-12">{{$lead->created_at}}</span>
                <span class="col-lg-3 col-sm-12 col-xs-12"></span>
                <span class="col-lg-3 col-sm-12 col-xs-12"> <span
                            class="">Source: &nbsp;</span> {{$lead->source}}</span>
            </div>
            <div class="row  ">
                <div class="col-lg-3 col-sm-12 col-xs-12 "><span class="">Zoho id : &nbsp;</span> {{$lead->zoho_id}}
                </div>

                <div class="col-lg-3 col-sm-12 col-xs-12 "><span class="">Status : &nbsp;</span> {{$lead->status}}
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12   ">
                    <span class="">Action : &nbsp;</span> {{$lead->action}}
                </div>

                <div class="col-lg-3 col-sm-12 col-xs-12 ">
                    <a href="{{route('LeadEvents.LeadEvent.list' , $lead->id)}}" class="btn btn-info"> Event list</a>

                </div>
            </div>

            <div class="row  ">
                <div class="col-lg-3 col-sm-12 col-xs-12 " style=" margin: 7px 0 7px 0">
                    <span class="text-info h4" style="padding: 0  5px 0 5px">  {{$lead->client_name}}</span>
                </div>
            </div>



            <div class="row">
                <div class="col-12" style="margin: 15px">
                    {{$lead->description}} </div>
            </div>

            <div class="row">
                <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
                </div>
            </div>

        @endforeach
        <div class="float-right">   {{ $leads->links() }} </div>


    </div>

@endif
