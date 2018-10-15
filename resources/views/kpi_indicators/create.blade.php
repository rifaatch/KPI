@extends('layouts.app')

@section('content')

    <div class="container h-100">

        <div class="row h-100 ">
            <div class="col-md-4 col-sm-12 col-xs-12">
            <span class="float-left">
                <h4 >Create New Kpi Indicator</h4>
            </span>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12">
                <a href="{{ route('kpi_indicators.kpi_indicator.index') }}" class="btn btn-primary float-md-right" style="margin-bottom: 2px" title="Show All users Kpi Indicator">
                    <i class="fas fa-long-arrow-alt-down"></i>Show all
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

            <form method="POST" action="{{ route('kpi_indicators.kpi_indicator.store') }}" accept-charset="UTF-8" id="create_kpi_indicator_form" name="create_kpi_indicator_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('kpi_indicators.form', [
                                        'kpiIndicator' => null,
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


