@extends('layouts.app')

@section('content')
    <div class="container h-100">

    @if(Session::has('success_message'))
        <div class="row">
            <div class="col-md-6" >
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
        </div>
        </div>
    @endif



        <div class="row h-100 "  style="margin-bottom: 3px" >

            <div class="col-3">
                <h4 >Holidays</h4>
            </div>

        <div class="col-3" role="group">
                <a href="{{ route('holidays.holiday.create') }}" class="btn btn-success float-right" title="Create New Holiday">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

        </div>
        
        @if(count($holidays) == 0)
            <div class="panel-body text-center">
                <h4>No Holidays Available!</h4>
            </div>
        @else
            <div class="row">
                <div    class="col-md-6 col-xs-12 col-sm-12" >
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Office</th>
                            <th>Date</th>
                            <th>Year</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($holidays as $holiday)
                        <tr>
                            <td>{{ $holiday->name }}</td>
                            <td>{{ optional($holiday->office)->office_name }}</td>
                            <td>{{ $holiday->date }}</td>
                            <td>{{ $holiday->year }}</td>

                            <td>

                                <form method="POST" action="{!! route('holidays.holiday.destroy', $holiday->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">

                                        <a href="{{ route('holidays.holiday.edit', $holiday->id ) }}" class="btn btn-primary" title="Edit Holiday">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Holiday" onclick="return confirm('Delete Holiday?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
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
            {!! $holidays->render() !!}
        </div>
                </div>
            </div>
        @endif
    
    </div>
@endsection