@extends('layouts.app')

@section('content')

    <div class="container h-100">

        <div class="row h-100 ">
            <div class="col-md-6 col-sm-12 col-xs-12">
            
            <span class="float-left">
                <h4 >Create New Employee</h4>
            </span>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12">
            <div class="btn-group btn-group-sm float-md-right" role="group">
                <a href="{{ route('employees.employee.index') }}" class="btn btn-primary" title="Show All Employee">
                    <i class="fas fa-long-arrow-alt-down"></i>Show all
                </a>
            </div>

        </div>
        </div>

        <div class="container h-100">

            <div class="row h-100 justify-content-center">
        <div class="col-12">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('employees.employee.store') }}" accept-charset="UTF-8" id="create_employee_form" name="create_employee_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('employees.form', [
                                        'employee' => null,
                                      ])

                <div class="form-group">
                    <div class="offset-md-1 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>
    </div>
    </div>
@endsection


