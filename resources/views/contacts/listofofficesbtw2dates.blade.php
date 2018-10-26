<div class="row" >


    @if ($offices->count()<>0)

        @foreach($offices as $office)


            <div class="col-lg-3 col-md-3 col-12  box" >  <a href="{{route('contacts.byofficeemployeesbydates',[$office->id ,$selectedDate1 , $selectedDate2])}}"  >
                    <i class="fas fa-building"></i>

                    @php ( $newContacts=$office->contacts()->whereDate('contacts.created_at', '>=', $selectedDate1)->whereDate('contacts.created_at', '<=', $selectedDate2) )

                    {{$office->office_name}}


                    @if ( $newContacts->count() <> 0 )
                        <div style="margin: 4px 0 2px 0 ; color:#286090   ">
                            {{$newContacts->count()}} New Contacts
                        </div>

                    @else
                        <div style="margin: 4px 0 2px 0 ; color: crimson">
                            Zero New Contacts
                        </div>
                    @endif
                </a>
            </div>
        @endforeach

    @endif




</div>
</div>