@extends('layouts.app')

@section('content')

    <div class="container h-100">

        <div class="row h-100 ">

            <div class="col-md-6 col-sm-12 col-xs-12">
                <h4 class="">{{ !empty($title) ? $title : 'Office' }}</h4>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" role="group" style="margin-bottom: 2px">

                <a href="{{ route('offices.office.index') }}" class="btn btn-primary " title="Show All Office">
                    <i class="fas fa-long-arrow-alt-down"></i>Show all
                </a>

                <a href="{{ route('offices.office.create') }}" class="btn btn-success" title="Create New Office">
                    <i class="fas fa-plus"></i>
                </a>

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

            <form method="POST" action="{{ route('offices.office.update', $office->id) }}" id="edit_office_form" name="edit_office_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('offices.form', [
                                        'office' => $office,
                                      ])

                <div class="row form-group">
                    <div class="offset-md-2 col-md-6">
                        <input class="btn btn-primary " type="submit" value="Update">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection