@extends('layouts.app')

@section('content')

    <div class="container h-100">

        <div class="row h-100 ">

            <div class="col-md-1 col-sm-12 col-xs-12" >
                <h4 >{{ !empty($holiday->name) ? $holiday->name : 'Holiday' }}</h4>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" role="group" style="margin-bottom: 2px">

                <a href="{{ route('holidays.holiday.index') }}" class="btn btn-primary float-right" title="Show All Holiday">
                    <i class="fas fa-long-arrow-alt-down"></i>Show all
                </a>

                <a href="{{ route('holidays.holiday.create') }}" class="btn btn-success float-right" title="Create New Holiday">
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

            <form method="POST" action="{{ route('holidays.holiday.update', $holiday->id) }}" id="edit_holiday_form" name="edit_holiday_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('holidays.form', [
                                        'holiday' => $holiday,
                                      ])

                <div class="form-group">
                    <div class="offset-md-1 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection