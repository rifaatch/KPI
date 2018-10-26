
@if ( $contactEvents->total() == 0 )
    <div class="alert alert-danger"><h3> Zero Contact Event </h3></div>
@else
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="float-right text-info h4">   Total event : {{$contactEvents->total()}}</span>
            </div>
        </div>


        @foreach ( $contactEvents as $contactEvent )

            <div class="row  ">
                <span class="col-lg-3 col-md-4 col-sm-12 col-xs-12">{{$contactEvent->created_at}}</span>
            </div>
            <div class="row  ">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 " ><span
                            class="">Zoho id : &nbsp;</span> {{$contactEvent->zoho_id}}</div>


                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12   "    >
                    <span class="">Action : &nbsp;</span> {{$contactEvent->action_name}}
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 "  ><span
                            class="">done by : &nbsp; {{$contactEvent->employee->name}}</span></div>

                <div class="col-lg-3  col-md-6 d-none d-md-block d-lg-block d-xl-block   "  style="padding: 10px">
                   <a href="{{route('contactEvents.contactEvent.list' , $contactEvent->contact_id)}}" class="btn btn-info"> Details</a>
                </div>


            </div>

            <div class="row  ">

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "  style="padding: 5px">
                    <span class="text-info h4">&nbsp; {{$contactEvent->contact->client_name}}</span></div>



            </div>

            <div class="row">
                <div class="col-12" style="margin: 15px">
                    {{$contactEvent->description}} </div>
            </div>
        <div class="row" >
            <div class="col-xs-12 col-sm-12 d-block d-sm-none   "  style="padding: 5px">
                <a href="{{route('contactEvents.contactEvent.list' , $contactEvent->contact_id)}}" class="btn btn-info"> Details</a>
            </div>

        </div>

            <div class="row">
                <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
                </div>
            </div>

        @endforeach
        <div class="float-right">   {{ $contactEvents->links() }} </div>
    </div>
        @endif





