
@if ( $leadevents->total() == 0 )
    <div class="alert alert-danger"><h3> Zero Lead Event </h3></div>
@else
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="float-right text-info h4">   Total event : {{$leadevents->total()}}</span>
            </div>
        </div>


        @foreach ( $leadevents as $leadEvent )

            <div class="row  ">
                <span class="col-lg-3 col-md-4 col-sm-12 col-xs-12">{{$leadEvent->created_at}}</span>
            </div>
            <div class="row  ">
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 "><span
                            class="">Zoho id : &nbsp;</span> {{$leadEvent->zoho_id}}</div>


                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12   "    >
                    <span class="">Action : &nbsp;</span> {{$leadEvent->action_name}}
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 "  ><span
                            class="">done by : &nbsp; {{$leadEvent->employee->name}}</span></div>

                <div class="col-lg-3  col-md-6 d-none d-md-block d-lg-block d-xl-block   "  style="padding: 10px">
                    <a href="{{route('LeadEvents.LeadEvent.list' , $leadEvent->lead_id)}}" class="btn btn-info"> Details</a>
                </div>


            </div>

            <div class="row  ">

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "  style="padding: 5px">
                <span class="text-info h4">&nbsp; {{$leadEvent->lead->client_name}}</span></div>



            </div>

            <div class="row">
                <div class="col-12" style="margin: 15px">
                    {{$leadEvent->description}} </div>
            </div>
            <div class="row" >
                <div class="col-xs-12 col-sm-12 d-block d-sm-none   "  style="padding: 5px">
                       <a href="{{route('LeadEvents.LeadEvent.list' , $leadEvent->lead_id)}}" class="btn btn-info"> Details</a>
                </div>

            </div>

            <div class="row">
                <div class="col-12" style="margin:5px 0 5px 0;border-bottom: #adb5bd solid 1px">
                </div>
            </div>

        @endforeach
        <div class="float-right">   {{ $leadevents->links() }} </div>
    </div>
@endif









