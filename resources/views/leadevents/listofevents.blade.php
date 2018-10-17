
@if ( $leadevents->total() == 0 )
    <div class="alert alert-danger"> <h3> Zero Event  </h3></div>
@else
    <div class="container">
        <span class="float-right">   Total event : {{$leadevents->total()}}</span>
        <br>
        <div class="row  ">

            <div class="col-lg  d-none d-lg-block cell" >
                <span class="">Zoho id</span>
            </div>
            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Employee </span>

            </div>
            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Event</span>

            </div>


            <div class="col-sm col-lg-4 d-none d-lg-block cell " >
                <span class="">Description</span>

            </div>
            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Created at</span>

            </div>

            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Details</span>

            </div>

        </div>
        <div class="row d-xs-none -d-sm-none " style="height: 5px"></div>
        @foreach ( $leadevents as $leadevent )

            <div class="row ">

                <div class="col-sm cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none">Zoho id :</span> {{$leadevent->action_id}}
                </div>
                <div class="col-sm  cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none"> Employee :</span>
                    {{$leadevent->employee->name}}
                </div>
                <div class="col-sm cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none">Event:</span>
                    {{$leadevent->action_name}}
                </div>

                <div class="col-sm col-lg-4 cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none">Description :</span>
                    {{$leadevent->description}}
                </div>

                <div class="col-sm cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none">Created at:</span>
                    {{$leadevent->created_at}}
                </div>
                <div class="col-sm cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none"></span>
                    <a href="{{route('LeadEvents.LeadEvent.list' , $leadevent->lead_id)}}" class="btn btn-info"> Details</a>
                </div>

            </div>
            <div class="row d-md-none -d-lg-none -d-xl-none" style="height: 15px"></div>
            <div class="row d-xs-none -d-sm-none " style="height: 5px"></div>

    @endforeach
    </div>

@endif
