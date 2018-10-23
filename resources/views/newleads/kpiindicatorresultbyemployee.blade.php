

@php ( $employees=$selectedoffice->employee()->get() )


@if ($employees->count() ==0)
    <h2>   No employee at this office yet !!!</h2>
@else
@foreach($employees as $employee)

@php ( $leads = $employee->leads()->whereDate('leads.created_at', '>=', $date1) ->whereDate('leads.created_at', '<=', $date2) )
@php ( $events = $employee->leadEvent()->whereDate('lead_events.created_at', '>=', $date1) ->whereDate('lead_events.created_at', '<=', $date2) )

<div><h3 style="margin: 20px 0 1px 0">  {{$employee->name}} </h3>
    @if( $leads->count() >= $employee->kpiIndicator->newlead * $workingdays  )

        @php ( $newleadsispassed = "passed" )

    @else
        @php ( $newleadsispassed = "notpassed" )
    @endif
    <div class="row" style="margin-bottom: 3px">

        <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12  {{$newleadsispassed}}">
            <span style="font-size: large"> {{$employee->name}}  </span> office done <span
                    style="font-size: large"> {{$leads->count()}} </span> new leads the min he should do is
            <span style="font-size: large">   {{$employee->kpiIndicator->newlead * $workingdays}} </span>
        </div>
    </div>


    @if( $events->count() >= $employee->kpiIndicator->action * $workingdays  )

        @php ( $actionsispassed = "passed" )

    @else
        @php ( $actionsispassed = "notpassed" )
    @endif
    <div class="row" style="margin-top: 3px">

        <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
            <span style="font-size: large"> {{$employee->name}}  </span> office done <span
                    style="font-size: large"> {{$events->count()}} </span> events the min he should do is
            <span style="font-size: large">   {{$employee->kpiIndicator->action * $workingdays}} </span>
        </div>
    </div>


</div>


    @endforeach

    @endif



