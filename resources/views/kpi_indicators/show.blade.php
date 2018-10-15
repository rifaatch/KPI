@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Kpi Indicator' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('kpi_indicators.kpi_indicator.destroy', $kpiIndicator->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('kpi_indicators.kpi_indicator.index') }}" class="btn btn-primary" title="Show All Kpi Indicator">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('kpi_indicators.kpi_indicator.create') }}" class="btn btn-success" title="Create New Kpi Indicator">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('kpi_indicators.kpi_indicator.edit', $kpiIndicator->id ) }}" class="btn btn-primary" title="Edit Kpi Indicator">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Kpi Indicator" onclick="return confirm('Delete Kpi Indicator?')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Employee</dt>
            <dd>{{ optional($kpiIndicator->employee)->name }}</dd>
            <dt>Action</dt>
            <dd>{{ $kpiIndicator->action }}</dd>
            <dt>Newlead</dt>
            <dd>{{ $kpiIndicator->newlead }}</dd>
            <dt>Created At</dt>
            <dd>{{ $kpiIndicator->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection