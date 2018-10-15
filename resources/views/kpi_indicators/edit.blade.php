@extends('layouts.app')

@section('content')

    <div class="container h-100">

        <div class="row h-100 ">

            <div class="col-md-4 col-sm-12 col-xs-12">

                <h4 class="float-left">{{ !empty($title) ? $title : 'User Kpi Indicator' }}</h4>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12">

                <a href="{{ route('kpi_indicators.kpi_indicator.index') }}" class="btn btn-primary float-right" style="margin-bottom: 2px" title="Show All Kpi Indicator">
                    <i class="fas fa-long-arrow-alt-down"></i>Show all
                </a>

                <a href="{{ route('kpi_indicators.kpi_indicator.create') }}" class="btn btn-success float-right" style="margin-bottom: 2px"  title="Create New Kpi Indicator">
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

            <form method="POST" action="{{ route('kpi_indicators.kpi_indicator.update', $kpiIndicator->id) }}" id="edit_kpi_indicator_form" name="edit_kpi_indicator_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('kpi_indicators.editform', [
                                        'kpiIndicator' => $kpiIndicator,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection