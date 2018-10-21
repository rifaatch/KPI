@extends('layouts.app')

@section('content')

    <div class="container h-100">

        <div class="row h-100 " style="margin-bottom: 3px">

            <div class="col-md-7 col-sm-12 col-xs-12" >

            <span class="float-left">
                <h4 class="">Create New Holiday</h4>
            </span>

                <div class="btn-group btn-group-sm float-md-right" role="group">
                <a href="{{ route('holidays.holiday.index') }}" class="btn btn-primary" title="Show All Holiday" >
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

            <form method="POST" action="{{ route('holidays.holiday.store') }}" accept-charset="UTF-8" id="create_holiday_form" name="create_holiday_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('holidays.form', [
                                        'holiday' => null,
                                      ])

                <div class="form-group">
                    <div class="offset-md-1 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>


@endsection


