@extends('layouts.app')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Home</h1>
        <a class="nav-link float-right" href="{{route('news.create')}}">Maak nieuwe Review</a>
    </header>
    <div class="container">
        <div class="container box">
            <h3 align="center">Zoek de Review</h3><br />
            <div class="panel panel-default">
                <div class="panel-heading">Search Data</div>
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Data" />
                    </div>
                    <div class="table-responsive">
                        <h3 align="center">Data: <span id="total_records"></span></h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Titel</th>
                                <th>Afbeelding</th>
                                <th>Beschrijving</th>
                                <th>Categorie</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                fetch_customer_data();
                function fetch_customer_data(query = '')
                {
                    $.ajax({
                        url:"{{ route('search.action') }}",
                        method:'GET',
                        data:{query:query},
                        dataType:'json',
                        success:function(data)
                        {
                            $('tbody').html(data.table_data);
                            $('#total_records').text(data.total_data);
                        }
                    })
                }
                $(document).on('keyup', '#search', function(){
                    var query = $(this).val();
                    fetch_customer_data(query);
                });
            });
        </script>
    </div>
@endsection
