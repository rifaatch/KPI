@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($employee->name) ? $employee->name : 'Employee' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('employees.employee.destroy', $employee->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('employees.employee.index') }}" class="btn btn-primary" title="Show All Employee">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('employees.employee.create') }}" class="btn btn-success" title="Create New Employee">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('employees.employee.edit', $employee->id ) }}" class="btn btn-primary" title="Edit Employee">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Employee" onclick="return confirm('Delete Employee?')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>name</dt>
            <dd>{{ $employee->name }}</dd>
            <dt>zoho_id</dt>
            <dd>{{ optional($employee->zoho)->id }}</dd>
            <dt>office_id</dt>
            <dd>{{ optional($employee->office)->id }}</dd>
            <dt>created_at</dt>
            <dd>{{ $employee->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection