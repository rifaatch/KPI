
<div class="row form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-1 control-label">Name</label>
    <div class="col-md-7">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($employee)->name) }}" minlength="1" maxlength="100" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="row form-group {{ $errors->has('zoho_id') ? 'has-error' : '' }}">
    <label for="zoho_id" class="col-md-1 control-label">Zoho id</label>
    <div class="col-md-7">
        <input class="form-control" type="number" id="zoho_id" name="zoho_id" required="true" value="{{ old('zoho_id', optional($employee)->zoho_id) }}"  placeholder="Enter Zoho ID here..." >


        {!! $errors->first('zoho_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class=" row form-group {{ $errors->has('office_id') ? 'has-error' : '' }}" >
    <label for="office_id" class="col-md-1 control-label"  style="padding-left: 0!important; ;padding-right: 0" >Office name</label>
    <div class="col-md-7">
        <select class="form-control" id="office_id" name="office_id" required="true">
        	    <option value="" style="display: none;" {{ old('office_id', optional($employee)->office_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter office here...</option>
        	@foreach ($offices as $key => $office)
			    <option value="{{ $key }}" {{ old('office_id', optional($employee)->office_id) == $key ? 'selected' : '' }}>
			    	{{ $office }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('office_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


