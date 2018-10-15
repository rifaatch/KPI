@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Office' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('offices.office.destroy', $office->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('offices.office.index') }}" class="btn btn-primary" title="Show All Office">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('offices.office.create') }}" class="btn btn-success" title="Create New Office">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('offices.office.edit', $office->id ) }}" class="btn btn-primary" title="Edit Office">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Office" onclick="return confirm('Delete Office?'>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Office Name</dt>
            <dd>{{ $office->office_name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $office->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection