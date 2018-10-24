@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="container ">

        <div class="row  ">

            <div class="col-md-3 col-sm-12 col-xs-12">
                <h4 >Kpi Indicators</h4>
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12" role="group">
                <a href="{{ route('kpi_indicators.kpi_indicator.create') }}" class="btn btn-success float-md-right" style="margin-bottom: 2px" title="Create New Kpi Indicator">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

        </div>
        
        @if(count($kpiIndicators) == 0)
            <div class="panel-body text-center">
                <h4>No Kpi Indicators Available!</h4>
            </div>
        @else



       {{--     <div class="table-responsive">--}}
                <div class="row">
                    <div class="col-md-9 col-xs-9 col-sm-9 ">
                <table class="table table-striped">
                    <thead>
                    <tr >all numbers are per day </tr>
                        <tr>
                            <th scope="col">Employee</th>

                            <th scope="col">new leads</th>
                            <th scope="col">lead events</th>

                            <th scope="col">new applications</th>
                            <th scope="col">application events</th>


                            <th scope="col">lnew contacts</th>
                            <th scope="col">contact events</th>

                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($kpiIndicators as $kpiIndicator)
                        <tr>

                            <th scope="row">{{ optional($kpiIndicator->employee)->name }}</th>

                            <td>{{ $kpiIndicator->newlead }}</td>
                            <td>{{ $kpiIndicator->action }}</td>

                            <td>{{ $kpiIndicator->new_applications }}</td>
                            <td>{{ $kpiIndicator->application_events }}</td>

                            <td>{{ $kpiIndicator->new_contacts }}</td>
                            <td>{{ $kpiIndicator->contact_events }}</td>



                            <td>

                                <form method="POST" action="{!! route('kpi_indicators.kpi_indicator.destroy', $kpiIndicator->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">

                                        <a href="{{ route('kpi_indicators.kpi_indicator.edit', $kpiIndicator->id ) }}" class="btn btn-primary" title="Edit Kpi Indicator">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete the user Kpi Indicator" onclick="return confirm('Delete the user Kpi Indicator?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

           {{-- </div>--}}


        <div class="panel-footer">
            {!! $kpiIndicators->render() !!}
        </div>
                </div>
                </div>
        @endif
    
    </div>
@endsection