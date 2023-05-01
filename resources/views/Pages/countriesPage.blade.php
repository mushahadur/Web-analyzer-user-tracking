
@extends('Layout.app')

@section('title',' Countries Data Page')

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
                    <div class="page-content">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Countries Data Table</div>
                            </div>
                            <div class="ibox-body mr-5">
                                <div style="overflow-x:auto;">
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="Countries-table" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>User ID</th>
                                            <th>User Domain</th>
                                            <th>Visitor IP</th>
                                            <th>Continents</th>
                                            <th>Flag Img</th>
                                            <th>Country</th>
                                            <th>Country Code</th>
                                            <th>Region</th>
                                            <th>City</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Capital</th>
                                            <th>Timezone</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php($i = 1)
                                        @foreach($allCountries as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$item->user_id}}</td>
                                                <td>{{$userDomainName}}</td>
                                                <td>{{$item->visitor_ip}}</td>
                                                <td>{{$item->continents}}</td>
                                                <td><img width="30px" height="25px" src="{{$item->flag_img}}" alt=""></td>
                                                <td>{{$item->country}}</td>
                                                <td>{{$item->country_code}}</td>
                                                <td>{{$item->region}}</td>
                                                <td>{{$item->city}}</td>
                                                <td>{{$item->latitude}}</td>
                                                <td>{{$item->longitude}}</td>
                                                <td>{{$item->capital}}</td>
                                                <td>{{$item->timezone_id}}</td>
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
    </div>

@endsection

@section('script')


<script type="text/javascript">
    $(document).ready(function () {
        $('#Countries-table').DataTable({
            responsive: true
        });
    })
</script>

@endsection

