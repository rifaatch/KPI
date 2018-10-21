@if ( $leads->total() == 0  )
    <div class="alert alert-danger"> <h3> Zero lead  </h3></div>

@else
    <div class="container">
        <span >   Total lead : {{$leads->total()}}</span>
        <div class="row  ">

            <div class="col-lg  d-none d-lg-block cell" >
                <span class="">Zoho id</span>
            </div>
            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Status </span>

            </div>
            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Client Name</span>

            </div>

            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Action</span>

            </div>
            <div class="col-sm col-lg-4 d-none d-lg-block cell " >
                <span class="">Description</span>

            </div>
            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Updated at</span>

            </div>
            <div class="col-lg d-none d-lg-block cell" >
                <span class="">Event list</span>

            </div>

        </div>
        <div class="row d-xs-none -d-sm-none " style="height: 5px"></div>
        @foreach( $leads as $lead)

            <div class="row ">

                <div class="col-sm cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none">Zoho id :</span> {{$lead->zoho_id}}
                </div>
                <div class="col-sm  cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none">Status :</span>
                    {{$lead->status }}
                </div>
                <div class="col-sm cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none">Client Name :</span>
                    {{$lead->client_name}}
                </div>

                <div class="col-sm  cell" >
                    <span class="d-md-none -d-lg-none -d-xl-none">Action :</span>
                    {{$lead->action}}
                </div>
                <div class="col-sm col-lg-4 cell " >
                    <span class="d-md-none -d-lg-none -d-xl-none">Description :</span>
                    {{$lead->description}}
                </div>
                <div class="col-sm  cell" >
                    <span class="d-md-none -d-lg-none -d-xl-none">Action :</span>
                    {{$lead->updated_at}}
                </div>
                <div class="col-sm  cell" >
                    <a href="{{route('LeadEvents.LeadEvent.list' , $lead->id)}}" class="btn btn-info"> Event list</a>

                </div>
            </div>
            <div class="row d-md-none -d-lg-none -d-xl-none" style="height: 15px"></div>
            <div class="row d-xs-none -d-sm-none " style="height: 5px"></div>

        @endforeach


        <div class="float-right" >   {{ $leads->links() }} </div>
    </div>

@endif
