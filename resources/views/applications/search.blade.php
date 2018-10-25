@extends('layouts.app')

@section('header_styles')
<style>

    .cell {
        border-top: solid 1px;
        border-bottom: solid 1px;
        border-left: solid 1px;
        border-right: solid 1px;
        border-color:#dfdfdf!important;
    }

</style>

@endsection

@section('content')
    <div class="container">
        <h5> Search Bar</h5>
        <div class="row">
            <div class="col-8">
                <div class="input-group">
                    <input class="form-control border-secondary py-2" id="search" name="search" type="search"
                           placeholder="Search by Application Zoho id or by Cleint name or Description ... ">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="getdata">
                            <i class="fa fa-search"></i>
                        </button>


                    </div>
                </div>
            </div>
        </div>
            <br>
        <div id="htmdata">

        </div>
    </div>

@endsection


@section('footer_scripts')

    <script>
        $(document).ready(function () {
            $("#getdata").click(function () {
                searchText = $("#search").val();

                searchurl = "{{route('applications.search.getdata')}}"
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: searchurl,

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "searchText":searchText,


                    },
                    success: function (response) {
                        $('#htmdata').html(response);


                    },
                    error: function (response) {
                        console.log('Error' + response);

                    }
                })


            })
        });
    </script>



@endsection
