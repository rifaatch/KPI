@foreach($offices as $office )

    <div >  <h3 style="margin: 20px 0 1px 0" > <a href="{{route('kpi_indicators.byemployees.btw2dates',[$office->id,$date1,$date2])}}" > {{$office->office_name}}</a></h3>
    @if( $office->newleads >= $office->kpiIndicators->sum('newlead')*$office->workingdays  )

    @php ( $newleadsispassed = "passed" )

    @else
        @php ( $newleadsispassed = "notpassed" )
        @endif
        <div class="row" style="margin-bottom: 3px">

    <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12  {{$newleadsispassed}}">
        <span style="font-size: large"> {{$office->office_name}}  </span>  office creates <span style="font-size: large"> {{$office->newleads}} </span> new leads  the min he should do is
        <span style="font-size: large">   {{$office->kpiIndicators->sum('newlead')*$office->workingdays}} </span>
    </div>
    </div>


        @if( $office->events >= $office->kpiIndicators->sum('action')*$office->workingdays  )

            @php ( $actionsispassed = "passed" )

        @else
            @php ( $actionsispassed = "notpassed" )
        @endif
        <div class="row" style="margin-top: 3px">

            <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
                <span style="font-size: large"> {{$office->office_name}}  </span>  office done <span style="font-size: large"> {{$office->events}} </span>  lead events  the min he should do is
                <span style="font-size: large">   {{$office->kpiIndicators->sum('action')*$office->workingdays}} </span>
            </div>
        </div>


        @if( $office->newapplications >= $office->kpiIndicators->sum('new_applications')*$office->workingdays  )

            @php ( $actionsispassed = "passed" )

        @else
            @php ( $actionsispassed = "notpassed" )
        @endif
        <div class="row" style="margin-top: 3px">

            <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
                <span style="font-size: large"> {{$office->office_name}}  </span>  office creates <span style="font-size: large"> {{$office->newapplications}} </span>  new Applications  the min he should do is
                <span style="font-size: large">   {{$office->kpiIndicators->sum('new_applications')*$office->workingdays}} </span>
            </div>
        </div>


        @if( $office->applicationEvents >= $office->kpiIndicators->sum('application_events')*$office->workingdays  )

            @php ( $actionsispassed = "passed" )

        @else
            @php ( $actionsispassed = "notpassed" )
        @endif
        <div class="row" style="margin-top: 3px">

            <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
                <span style="font-size: large"> {{$office->office_name}}  </span>  office done <span style="font-size: large"> {{$office->applicationEvents}} </span>   Application events the min he should do is
                <span style="font-size: large">   {{$office->kpiIndicators->sum('application_events')*$office->workingdays}} </span>
            </div>
        </div>

        @if( $office->newcontacts >= $office->kpiIndicators->sum('new_contacts')*$office->workingdays  )

            @php ( $actionsispassed = "passed" )

        @else
            @php ( $actionsispassed = "notpassed" )
        @endif
        <div class="row" style="margin-top: 3px">

            <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
                <span style="font-size: large"> {{$office->office_name}}  </span>  office creates <span style="font-size: large"> {{$office->newcontacts}} </span> new Contacts the min he should do is
                <span style="font-size: large">   {{$office->kpiIndicators->sum('new_contacts')*$office->workingdays}} </span>
            </div>
        </div>


        @if( $office->contactEvents >= $office->kpiIndicators->sum('application_events')*$office->workingdays  )

            @php ( $actionsispassed = "passed" )

        @else
            @php ( $actionsispassed = "notpassed" )
        @endif
        <div class="row" style="margin-top: 3px">

            <div class="offset-lg-1-1 col-lg-5 col-md-8 col-sm-12 col-xs-12   {{$actionsispassed}}">
                <span style="font-size: large"> {{$office->office_name}}  </span>  office done <span style="font-size: large"> {{$office->contactEvents}} </span> Contacts events the min he should do is
                <span style="font-size: large">   {{$office->kpiIndicators->sum('application_events')*$office->workingdays}} </span>
            </div>
        </div>




    </div>
    @endforeach


