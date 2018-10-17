@if ( $employees->count() == 0  )
<h5 class=" bg-warning " style="margin-top: 20px;text-align: center" > No employees at this office </h5>
    @else
@foreach($employees as $employee)


    <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route ('leads.newlead.list.byemp',[$employee->id,$date1 , $date2])}}"  >  <i class="fas fa-user-tie" style="margin-right: 4px"></i>

        @php ( $leads = $employee->leads()->whereDate('leads.created_at', '>=', $date1) ->whereDate('leads.created_at', '<=', $date2) )

      <span>     {{$employee->name}}</span>

            @if ( $leads->count() <> 0 )
                <div style="margin: 4px 0 2px 0 ;  ">
                    <span class="text-primary" >    {{$leads->count()}} New  Leads </span>
                </div>

            @else
                <div style="margin: 4px 0 2px 0 ;">
                    <span  class="text-danger" >    Zero New  Lead  </span>
                </div>
            @endif
        </a>
    </div>
@endforeach
@endif