
@extends('Layout.app')

@section('title',' View Visitor IP On Map')

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
                                <div class="ibox-title">View Visitor IP On Map Data Table</div>
                            </div>
                            <div class="ibox-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Visitor IP</th>
                                            <th>Country</th>
                                            <th>Region</th>
                                            <th>Flag</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>View On Map</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php($i = 1)
                                        @foreach($viewOnMapData as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$item->visitor_ip}}</td>
                                                <td>{{$item->country}}</td>
                                                <td>{{$item->region}}</td>
                                                <td><img src="{{$item->flag_img}}" width="30px" height="20px" alt=""></td>
                                                <td>{{$item->latitude}}</td>
                                                <td>{{$item->longitude}}</td>
                                                <td> <h1 class="viewOnMap" data-id="{{$item->id}}" data-latitude="{{$item->latitude}}" data-longitude="{{$item->longitude}}" style="cursor:pointer;"><i class="fas fa-map-marked"></i></h1> </td>
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


        <!-- Large modal -->
        <div id="showIpMapModal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Visitor IP Position</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="modal-content">
                                <div id="iFrameToViewIpPos" class="p-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    </div>
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


    $('.viewOnMap').on('click',function (){
        let id = $(this).data('id');
        let latitude = $(this).data('latitude');
        let longitude = $(this).data('longitude');

        let mapUrl = "https://www.google.com/maps?q="+latitude+","+longitude+"&z=15&output=embed";
        $('#iFrameToViewIpPos').html("<iframe src='"+mapUrl+"' width='750' height='480' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>");
        $('#showIpMapModal').modal('show');

        //alert(id+" "+latitude+" "+longitude)
    })
</script>
@endsection


