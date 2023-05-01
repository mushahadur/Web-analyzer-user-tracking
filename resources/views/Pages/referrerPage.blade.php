@extends('Layout.app')

@section('title',' Referrer Page')

@section('content')
    @include('Components.commonInfoAllPage')
    <h2 class="d-none">ok</h2>
    <h2 class="d-none">{{$id}}</h2>
    <hr>
    @include('Components.innerMenu')
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-wrapper">
                    <div class="page-content fade-in-up">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Referrer Data Table</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>User ID</th>
                                        <th>User Site Info</th>
                                        <th>Visitor Referrer URL</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php($i = 1)
                                    @foreach($allReferrerInfo as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->user_id}}</td>
                                            <td>{{$userDomainName}}</td>
                                            <td>{{$item->referrer_url}}</td>
                                            <td>{{$item->time}}</td>
                                            <td>{{$item->date}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
        </div>

        @endsection

        @section('script')


            <script type="text/javascript">
                $(function() {
                    $('#example-table').DataTable({
                        pageLength: 10,
                        //"ajax": './assets/demo/data/table_data.json',
                        /*"columns": [
                            { "data": "name" },
                            { "data": "office" },
                            { "data": "extn" },
                            { "data": "start_date" },
                            { "data": "salary" }
                        ]*/
                    });
                })
            </script>

@endsection

