@if ( $employees->count() == 0  )
<h5 class=" bg-warning " style="margin-top: 20px;text-align: center" > No employees at this office </h5>
    @else
@foreach($employees as $employee)


    <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route ('contactEvents.btwdates.employee.details',[$employee->id,$date1 , $date2])}}"  >  <i class="fas fa-user-tie" style="margin-right: 4px"></i>

        @php ( $events = $employee->contactEvents()->whereDate('contact_events.created_at', '>=', $date1) ->whereDate('contact_events.created_at', '<=', $date2) )

      <span>     {{$employee->name}}</span>

            @if ( $events->count() <> 0 )
                <div style="margin: 4px 0 2px 0 ;  ">
                    <span class="text-primary" >    {{$events->count()}}  Contacts Events </span>
                </div>

            @else
                <div style="margin: 4px 0 2px 0 ;">
                    <span  class="text-danger" >    Zero  Contacts Events </span>
                </div>
            @endif
        </a>
    </div>
@endforeach
@endif