<div class="row" >


    @if ($offices->count()<>0)

    @foreach($offices as $office)


    <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route('leads.lead.byofficeemployeesbydates',[$office->id ,$selectedDate1 , $selectedDate2])}}"  >
            <i class="fas fa-building"></i>

            @php ( $newlead=$office->leads()->whereDate('leads.created_at', '>=', $selectedDate1)->whereDate('leads.created_at', '<=', $selectedDate2) )

            {{$office->office_name}}


            @if ( $newlead->count() <> 0 )
            <div style="margin: 4px 0 2px 0 ; color:#286090   ">
                {{$newlead->count()}} New Leads
            </div>

            @else
            <div style="margin: 4px 0 2px 0 ; color: crimson">
                Zero New Leads
            </div>
            @endif
        </a>
    </div>
    @endforeach

    @endif




</div>
</div>