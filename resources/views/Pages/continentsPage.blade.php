
@extends('Layout.app')

@section('title',' Continents Data Page')

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
                                <div class="ibox-title">Continents Data Table</div>
                            </div>
                            <div class="ibox-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>User ID</th>
                                            <th>User Domain</th>
                                            <th>Visitor IP</th>
                                            <th>Continents</th>
                                            <th>Continent Code</th>
                                            <th>Timezone</th>
                                            <th>Timezone UTC</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php($i = 1)
                                        @foreach($allContinents as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$item->user_id}}</td>
                                                <td>{{$userDomainName}}</td>
                                                <td>{{$item->visitor_ip}}</td>
                                                <td>{{$item->continents}}</td>
                                                <td>{{$item->continent_code}}</td>
                                                <td>{{$item->timezone_id}}</td>
                                                <td>{{$item->timezone_utc}}</td>
                                                <td>{{$item->date}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
                $(document).ready(function () {
                    $('#example-table').DataTable({
                        responsive: true
                    });
                })
            </script>

@endsection

