@extends('layouts.app')

@section('content')
    <div class="container h-100">

        <div class="row h-100 ">

            <div class="col-md-6 col-sm-12 col-xs-12" >
                <h4 class=""> Edit the counselor :{{ !empty($counselor->name) ? $counselor->name : 'counselor' }}</h4>
            </div>
            <div class=" col-md-2 col-sm-12 col-xs-12 " role="group" style="margin-bottom: 2px">

                <a href="{{ route('counselors.counselor.create') }}" class="btn btn-success float-md-right" title="Create New counselor">
                    <i class="fas fa-user-plus"></i>
                </a>

                <a href="{{ route('counselors.counselor.index') }}" class="btn btn-primary float-md-right" title="Show All counselor">
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

            <form method="POST" action="{{ route('counselors.counselor.update', $counselor->id) }}" id="edit_counselor_form" name="edit_counselor_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('counselors.form', [
                                        'counselor' => $counselor,
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