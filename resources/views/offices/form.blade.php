
<div class="row form-group {{ $errors->has('office_name') ? 'has-error' : '' }}">
    <label for="office_name" class="col-md-2 control-label">Office Name</label>
    <div class="col-md-6">
        <input class="form-control" name="office_name" type="text" id="office_name" value="{{ old('office_name', optional($office)->office_name) }}" minlength="1" maxlength="100" required="true" placeholder="Enter office name here...">
        {!! $errors->first('office_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
