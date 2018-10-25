


    @if ( $countBysources->count()==0 )

        <div class="row" >

            <div class="col-12 d-flex justify-content-center alert alert-danger" style="margin-top: 25px"><h2 class="" > No new leads </h2></div>
        </div>
        <div class="row" >
    @else

        @foreach($countBysources as $source)


            <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route('applications.details.bysources',[$date1,$date2,$source->source])}}"  >  <i class="fas fa-bullhorn"></i>


                @if ( $source->source <>  null  )
                    {{$source->source}}

                    @else

                    Undefined Source

                    @endif

                    @if ( $source->countsofapplications <> 0 )
                        <div style="margin: 4px 0 2px 0 ; color:#286090   ">
                            {{$source->countsofapplications }} New Applications
                        </div>

                    @else
                        <div style="margin: 4px 0 2px 0 ; color: crimson">
                          Zero New Applications
                        </div>
                    @endif
                </a>
            </div>
        @endforeach

    @endif




</div>
</div>