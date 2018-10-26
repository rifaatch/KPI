<div class="row" >


    @if ($offices->count()<>0)

        @foreach($offices as $office)


            <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route('contactEvents.btwdates.employee' ,[$office->id ,$selectedDate1 , $selectedDate2])}}"  >
                    <i class="fas fa-building"></i>

                    @php ( $events=$office->contactsEvents()->whereDate('contact_events.created_at', '>=', $selectedDate1)->whereDate('contact_events.created_at', '<=', $selectedDate2) )

                    {{$office->office_name}}


                    @if ( $events->count() <> 0 )
                        <div style="margin: 4px 0 2px 0 ; color:#286090   ">
                            {{$events->count()}} Contact Events
                        </div>

                    @else
                        <div style="margin: 4px 0 2px 0 ; color: crimson">
                            Zero Contact Events
                        </div>
                    @endif
                </a>
            </div>
        @endforeach

    @endif




</div>
</div>