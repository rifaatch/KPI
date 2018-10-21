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



        <div class="row h-100 ">

            <div class="col-3">
                <h4 >Offices</h4>
            </div>

            <div class="col-3" role="group">
                <a href="{{ route('offices.office.create') }}" class="btn btn-success float-right" style="margin-bottom: 2px" title="Create New Office">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

        </div>
        
        @if(count($offices) == 0)
            <div class="panel-body text-center">
                <h4>No Offices Available!</h4>
            </div>
        @else
            <div class="row">
                <div    class="col-md-6 col-xs-12 col-sm-12" >
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Office Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($offices as $office)
                        <tr >
                            <td>{{ $office->office_name }}</td>

                            <td>



                                    <div class="btn-group btn-group-xs  float-right" role="group">

                                        <a href="{{ route('offices.office.edit', $office->id ) }}" class="btn btn-primary " title="Edit Office">
                                            <i class="fas fa-edit"></i>
                                        </a>


                                    </div>


                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $offices->render() !!}
        </div>
            </div>
            </div>
        @endif
    
    </div>
@endsection