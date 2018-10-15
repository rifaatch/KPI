@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="container h-100">

        <div class="row h-100 ">

            <div class="col-6 ">
                <h4 >Employees</h4>
            </div>

            <div class="col-6  " style="margin-bottom: 2px">
                <a href="{{ route('employees.employee.create') }}" class="btn btn-success float-right" title="Create New Employee">
                    <i class="fas fa-user-plus"></i>
                </a>
            </div>

        </div>
        
        @if(count($employees) == 0)
            <div class="panel-body text-center">
                <h4>No Employees Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>zoho id</th>
                            <th>Office name</th>
                            <th>created at</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{  $employee->zoho_id  }}</td>
                            <td>{{ optional($employee->office)->office_name }}</td>
                            <td>{{ $employee->created_at }}</td>

                            <td>

                                <form method="POST" action="{!! route('employees.employee.destroy', $employee->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        {{--<a href="{{ route('employees.employee.show', $employee->id ) }}" class="btn btn-info" title="Show Employee">
                                            <i class="fas fa-level-up-alt"></i></span>
                                        </a>--}}
                                        <a href="{{ route('employees.employee.edit', $employee->id ) }}" class="btn btn-primary" title="Edit Employee">
                                            <i class="fas fa-user-edit"></i>
                                        </a>

                                       {{-- <button type="submit" class="btn btn-danger" title="Delete Employee" onclick="return confirm(&quot;Delete Employee?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>--}}
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $employees->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection