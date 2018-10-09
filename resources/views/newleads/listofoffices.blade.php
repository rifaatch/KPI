<div class="row" >


    @if ($offices->count()<>0)

        @foreach($offices as $office)


            <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route('leads.lead.byofficeemployees',[$office->id , $selectedDate])}}"  >   <i class="fas fa-building"></i>



                    {{$office->office_name}}

                    @if ( $office->leads()->whereDate('leads.created_at', '=', $selectedDate)->count() <> 0 )
                        <div style="margin: 4px 0 2px 0 ; color:#286090   ">
                            {{$office->leads()->whereDate('leads.created_at', '=', $selectedDate)->count()}} New Leads
                        </div>

                    @else
                        <div style="margin: 4px 0 2px 0 ; color: crimson">
                            {{$office->leads()->whereDate('leads.created_at', '=', $selectedDate)->count()}} New Leads
                        </div>
                    @endif
                </a>
            </div>
        @endforeach

    @endif




</div>
</div>