@if ( $employees->count() == 0  )
<h5 class=" bg-warning " style="margin-top: 20px;text-align: center" > No employees at this office </h5>
    @else
@foreach($employees as $employee)


    <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route ('contacts.new.byemp',[$employee->id,$date1 , $date2])}}"  >  <i class="fas fa-user-tie" style="margin-right: 4px"></i>

        @php ( $contacts = $employee->contacts()->whereDate('contacts.created_at', '>=', $date1) ->whereDate('contacts.created_at', '<=', $date2) )

      <span>     {{$employee->name}}</span>

            @if ( $contacts->count() <> 0 )
                <div style="margin: 4px 0 2px 0 ;  ">
                    <span class="text-primary" >    {{$contacts->count()}} New Contacts </span>
                </div>

            @else
                <div style="margin: 4px 0 2px 0 ;">
                    <span  class="text-danger" >    Zero New Contacts  </span>
                </div>
            @endif
        </a>
    </div>
@endforeach
@endif