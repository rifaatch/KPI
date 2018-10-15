@extends('layouts.app')

@section('content')

    <div class="container h-100">

        <div class="row h-100 " style="margin-bottom: 10px">

            <div class="col-md-6 col-sm-12 col-xs-12">

            <span class="float-left">
                <h4 >Create New Office</h4>
            </span>
            </div>

                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="btn-group btn-group-sm float-md-right" role="group">

                <a href="{{ route('offices.office.index') }}" class="btn btn-primary" title="Show All Office">
                    <i class="fas fa-long-arrow-alt-down"></i>Show all
                </a>
            </div>
                </div>
        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('offices.office.store') }}" accept-charset="UTF-8" id="create_office_form" name="create_office_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('offices.form', [
                                        'office' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


