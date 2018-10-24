
<div class="row form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}">
    <label for="employee_id" class="col-md-1 control-label">Employee</label>
    <div class="col-md-5">
        <h4>  {{$kpiIndicator->employee->name}} </h4>
      {{--  <select class="form-control" id="employee_id" name="employee_id" required="true">
        	    <option value="" style="display: none;" {{ old('employee_id', optional($kpiIndicator)->employee_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select employee</option>
        	@foreach ($employees as $key => $employee)
			    <option value="{{ $key }}" {{ old('employee_id', optional($kpiIndicator)->employee_id) == $key ? 'selected' : '' }}>
			    	{{ $employee }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}--}}
    </div>
</div>


<div class="row form-group {{ $errors->has('newlead') ? 'has-error' : '' }}">
    <label for="newlead" class="col-md-1 control-label">New Leads</label>
    <div class="col-md-5">
        <input class="form-control" name="newlead" type="number" id="newlead" value="{{ old('newlead', optional($kpiIndicator)->newlead) }}" min="-2145483548" max="2145483545" required="true" placeholder="Enter newlead here...">
        {!! $errors->first('newlead', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="row form-group {{ $errors->has('action') ? 'has-error' : '' }}">
    <label for="action" class="col-md-1 control-label">Lead events</label>
    <div class="col-md-5">
        <input class="form-control" name="action" type="number" id="action" value="{{ old('action', optional($kpiIndicator)->action) }}" min="-2145483548" max="2145483545" required="true" placeholder="Enter Lead events here...">
        {!! $errors->first('action', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="row form-group {{ $errors->has('new_applications') ? 'has-error' : '' }}">
    <label for="new_applications" class="col-md-1 control-label">New Applications</label>
    <div class="col-md-5">
        <input class="form-control" name="new_applications" type="number" id="new_applications" value="{{ old('new_applications', optional($kpiIndicator)->new_applications) }}" min="-2145483548" max="2145483545" required="true" placeholder="Enter new applications...">
        {!! $errors->first('new_aplications', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('application_events') ? 'has-error' : '' }}">
    <label for="application_events" class="col-md-1 control-label">Application events</label>
    <div class="col-md-5">
        <input class="form-control" name="application_events" type="number" id="application_events" value="{{ old('application_events', optional($kpiIndicator)->application_events) }}" min="-2145483548" max="2145483545" required="true" placeholder="Enter application event...">
        {!! $errors->first('new_aplications', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('new_contacts') ? 'has-error' : '' }}">
    <label for="new_contacts" class="col-md-1 control-label">New contacts</label>
    <div class="col-md-5">
        <input class="form-control" name="new_contacts" type="number" id="new_contacts" value="{{ old('new_contacts', optional($kpiIndicator)->new_contacts) }}" min="-2145483548" max="2145483545" required="true" placeholder="Enter new contact...">
        {!! $errors->first('new_contacts', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('contact_events') ? 'has-error' : '' }}">
    <label for="contact_events" class="col-md-1 control-label">Application events</label>
    <div class="col-md-5">
        <input class="form-control" name="contact_events" type="number" id="contact_events" value="{{ old('contact_events', optional($kpiIndicator)->contact_events) }}" min="-2145483548" max="2145483545" required="true" placeholder="Enter contact event...">
        {!! $errors->first('contact_events', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<input type="hidden" id="employee_id" name="employee_id" value="{{$kpiIndicator->employee_id}}">

