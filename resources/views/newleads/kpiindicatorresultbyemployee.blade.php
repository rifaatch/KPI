

@php ( $employees=$selectedoffice->employee()->get() )


@if ($employees->count() ==0)
    <h2>   No employee at this office yet !!!</h2>
@else
@foreach($employees as $employee)

@php ( $leads = $employee->leads()->whereDate('leads.created_at', '>=', $date1) ->whereDate('leads.created_at', '<=', $date2) )
@php ( $events = $employee->leadEvent()->whereDate('lead_events.created_at', '>=', $date1) ->whereDate('lead_events.created_at', '<=', $date2) )

@php ( $applications = $employee->applications()->whereDate('applications.created_at', '>=', $date1) ->whereDate('applications.created_at', '<=', $date2) )
@php ( $applicationEvents = $employee->applicationEvents()->whereDate('application_events.created_at', '>=', $date1) ->whereDate('application_events.created_at', '<=', $date2) )

@php ( $contacts = $employee->contacts()->whereDate('contacts.created_at', '>=', $date1) ->whereDate('contacts.created_at', '<=', $date2) )
@php ( $contactEvents = $employee->contactEvents()->whereDate('contact_events.created_at', '>=', $date1) ->whereDate('contact_events.created_at', '<=', $date2) )


<div><h3 style="margin: 20px 0 1px 0">  {{$employee->name}} </h3>
    @if( $leads->count() >= $employee->kpiIndicator->newlead * $workingdays  )

        @php ( $newleadsispassed = "passed" )

    @else
        @php ( $newleadsispassed = "notpassed" )
    @endif
    <div class="row" style="margin-bottom: 3px">

        <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12  {{$newleadsispassed}}">
            <span style="font-size: large"> {{$employee->name}}  </span> office create <span
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
                    style="font-size: large"> {{$events->count()}} </span> Lead events the min he should do is
            <span style="font-size: large">   {{$employee->kpiIndicator->action * $workingdays}} </span>
        </div>
    </div>


    @if( $applications->count() >= $employee->kpiIndicator->new_applications * $workingdays  )

        @php ( $actionsispassed = "passed" )

    @else
        @php ( $actionsispassed = "notpassed" )
    @endif
    <div class="row" style="margin-top: 3px">

        <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
            <span style="font-size: large"> {{$employee->name}}  </span> office create <span
                    style="font-size: large"> {{$applications->count()}} </span> new Applications the min he should do is
            <span style="font-size: large">   {{$employee->kpiIndicator->new_applications * $workingdays}} </span>
        </div>
    </div>

    @if( $applicationEvents->count() >= $employee->kpiIndicator->application_events * $workingdays  )

        @php ( $actionsispassed = "passed" )

    @else
        @php ( $actionsispassed = "notpassed" )
    @endif
    <div class="row" style="margin-top: 3px">

        <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
            <span style="font-size: large"> {{$employee->name}}  </span> office done <span
                    style="font-size: large"> {{$applicationEvents->count()}} </span>  Application events the min he should do is
            <span style="font-size: large">   {{$employee->kpiIndicator->new_applications * $workingdays}} </span>
        </div>
    </div>


    @if( $contacts->count() >= $employee->kpiIndicator->new_contacts * $workingdays  )

        @php ( $actionsispassed = "passed" )

    @else
        @php ( $actionsispassed = "notpassed" )
    @endif
    <div class="row" style="margin-top: 3px">

        <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
            <span style="font-size: large"> {{$employee->name}}  </span> office create <span
                    style="font-size: large"> {{$contacts->count()}} </span>  New Contacts  the min he should do is
            <span style="font-size: large">   {{$employee->kpiIndicator->new_contacts * $workingdays}} </span>
        </div>
    </div>

    @if( $contactEvents->count() >= $employee->kpiIndicator->application_events * $workingdays  )

        @php ( $actionsispassed = "passed" )

    @else
        @php ( $actionsispassed = "notpassed" )
    @endif
    <div class="row" style="margin-top: 3px">

        <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
            <span style="font-size: large"> {{$employee->name}}  </span> office done <span
                    style="font-size: large"> {{$contactEvents->count()}} </span>   Contact events the min he should do is
            <span style="font-size: large">   {{$employee->kpiIndicator->application_events * $workingdays}} </span>
        </div>
    </div>


</div>


    @endforeach

    @endif



