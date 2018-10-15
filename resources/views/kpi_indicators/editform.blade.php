
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

<div class="row form-group {{ $errors->has('action') ? 'has-error' : '' }}">
    <label for="action" class="col-md-1 control-label">Actions</label>
    <div class="col-md-5">
        <input class="form-control" name="action" type="number" id="action" value="{{ old('action', optional($kpiIndicator)->action) }}" min="-2145483548" max="2145483545" required="true" placeholder="Enter action here...">
        {!! $errors->first('action', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('newlead') ? 'has-error' : '' }}">
    <label for="newlead" class="col-md-1 control-label">New Leads</label>
    <div class="col-md-5">
        <input class="form-control" name="newlead" type="number" id="newlead" value="{{ old('newlead', optional($kpiIndicator)->newlead) }}" min="-2145483548" max="2145483545" required="true" placeholder="Enter newlead here...">
        {!! $errors->first('newlead', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input type="hidden" id="employee_id" name="employee_id" value="{{$kpiIndicator->employee_id}}">

