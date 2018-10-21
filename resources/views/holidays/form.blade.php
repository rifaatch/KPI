
<div class="row form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-1 control-label">Name</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($holiday)->name) }}" minlength="1" maxlength="50" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row form-group {{ $errors->has('office_id') ? 'has-error' : '' }}">
    <label for="office_id" class="col-md-1 control-label">Office</label>
    <div class="col-md-6">
        <select class="form-control" id="office_id" name="office_id" required="true">
        	    <option value="" style="display: none;" {{ old('office_id', optional($holiday)->office_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select office</option>
        	@foreach ($offices as $key => $office)
			    <option value="{{ $key }}" {{ old('office_id', optional($holiday)->office_id) == $key ? 'selected' : '' }}>
			    	{{ $office }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('office_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class=" row form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-1 control-label">Date</label>
    <div class="col-md-6">
        <input class="form-control" name="date" type="date" id="date" value="{{ old('date', optional($holiday)->date) }}" required="true" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class=" row form-group {{ $errors->has('year') ? 'has-error' : '' }}">
    <label for="year" class="col-md-1 control-label">Year</label>
    <div class="col-md-6">
        <input class="form-control" name="year" type="number" id="year" value="{{ old('year', optional($holiday)->year) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter year here...">
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
    </div>
</div>

