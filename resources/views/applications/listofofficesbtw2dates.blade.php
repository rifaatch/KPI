<div class="row" >


    @if ($offices->count()<>0)

    @foreach($offices as $office)


    <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route('applications.byofficeemployeesbydates',[$office->id ,$selectedDate1 , $selectedDate2])}}"  >
            <i class="fas fa-building"></i>

            @php ( $newapplications=$office->applications()->whereDate('applications.created_at', '>=', $selectedDate1)->whereDate('applications.created_at', '<=', $selectedDate2) )

            {{$office->office_name}}


            @if ( $newapplications->count() <> 0 )
            <div style="margin: 4px 0 2px 0 ; color:#286090   ">
                {{$newapplications->count()}} New Applications
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