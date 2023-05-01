@extends('Layout.app')

@section('title','Tracking Info By Site')

@section('content')

    <h2>ok</h2>
    <h2>{{$id}}</h2>
    <hr>

    @include('Components.innerMenu')
    <hr>

    {{--    Overview Chart Top--}}
    <div class="container py-2 bg-white">
        <div class="row py-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Live Request Handling Counter</div>
                    <div class="card-body">
                        <div style="width: 900px" >
                            <canvas height="20px" width="60px" id="mycanvas"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--    Overview Chart Top--}}


{{--    Graphycal Interface Start --}}
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="ibox card">
                    <div class="ibox-head card-header">
                        <div class="ibox-title">Statistics</div>
                    </div>
                    <div class="ibox-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <canvas class="pl-2" id="doughnut_chart" width="100%" style="height:200px;"></canvas>
                            </div>

                            <div class="col-md-6">
                                @foreach($newAllDevInfo as $dev)
                                    @if($dev->device == "Desktop")
                                        <div class="m-b-20 ">
                                            <span class="text-success"><i class="fas fa-desktop"></i>{{$dev->device}}</span> {{$dev->count/100}}%
                                        </div>
                                    @elseif($dev->device == "Mobile")
                                        <div class="m-b-20">
                                            <span class="text-info"><i class="fas fa-mobile-alt"></i>{{$dev->device}}</span> {{$dev->count/100}}%
                                        </div>
                                    @else
                                        <div class="m-b-20">
                                            <span class="text-primary"><i class="fas fa-tablet-alt"></i>{{$dev->device}}</span> {{$dev->count/100}}%
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <ul class="list-group list-group-divider list-group-full">
                            @foreach($browserInfo as $browser)
                                <li class="list-group-item">{{$browser->browsers}} <span class="float-right text-success"><i class="fa fa-caret-up"></i> {{$browser->count / 100}}%</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            @include('Components.jVectorMap')

            <div class="col-md-6 d-none">
                <div class="card">
                    <div class="card-header">Browser Chart</div>
                    <div class="card-body">
                        <p class="card-title"></p>
                        <div class="canvas-wrapper">
                            <canvas id="myChartBrowser" style="width:80%;max-width:800px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    Graphycal Interface End --}}
{{--    let v = {latLng: [parseInt(res.data[i]['latLng']), parseInt(res.data[i]['lonLng'])], name: res.data[i]['name']+":"+parseInt(res.data[i]['count']) }--}}


    {{--    Device &&  Browser--}}
    <div class="container">
        <div class="row my-3 py-4">
            <div class="col-md-6 d-none">
                <div class="card">
                    <div class="card-header">Browser Chart</div>
                    <div class="card-body">
                        <p class="card-title"></p>
                        <div class="canvas-wrapper">
                            <canvas id="myChartBrowser" style="width:80%;max-width:800px"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{--    Device--}}
            <div class="col-md-6 d-none">
                <div class="card">
                    <div class="card-header">Device Chart</div>
                    <div class="card-body">
                        <div class="canvas-wrapper">
                            <table class="table table-striped">
                                <thead class="success">
                                <tr>
                                    <th>Device Name</th>
                                    <th class="text-end">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($newAllDevInfo as $dev)
                                    @if($dev->device == "Desktop")
                                        <tr>
                                            <td><i class="fas fa-desktop"></i> {{$dev->device}}</td>
                                            <td class="">{{$dev->count}}</td>
                                        </tr>
                                    @elseif($dev->device == "Mobile")
                                        <tr>
                                            <td><i class="fas fa-mobile-alt"></i>  {{$dev->device}}</td>
                                            <td class="text-end">{{$dev->count}}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td><i class="fas fa-tablet-alt"></i>  {{$dev->device}}</td>
                                            <td class="text-end">{{$dev->count}}</td>
                                        </tr>

                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--    Device--}}
        </div>
    </div>
    {{--  Device &&  Browser--}}




    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="content">
                    <div class="head">
                        <h5 class="mb-0">Top Visitors by Country</h5>
                        <p class="text-muted">Current year website visitor data</p>
                    </div>
                    <div class="canvas-wrapper">
                        <table class="table table-striped">
                            <thead class="success">
                            <tr>
                                <th>Country</th>
                                <th class="text-end">Total Visitor</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($allCountryInfo as $con)
                            <tr>
                                <td><img src="{{$con->flag_img}}" width="25px" height="25px" alt=""> {{$con->country}}</td>
                                <td class="text-end">{{$con->count}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="content">
                    <div class="head">
                        <h5 class="mb-0">Pages Loading Time</h5
                    </div>
                    <div class="">
                        <table class="table table-striped">
                            <thead class="success">
                            <tr>
                                <th>Page Name</th>
                                <th class="text-end">Loading Time</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($decodePageLoadTime as $pageLoadTime)
                            <tr>
                                <td>{{$pageLoadTime->page_url}} <a href="{{$pageLoadTime->page_url}}"><i class="fas fa-link blue"></i></a></td>
                                <td class="text-end">{{$pageLoadTime->loading_time}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{--    Pages And Refers--}}

    {{--    Pages And Refers--}}






@endsection

@section('script')


    <script>
        var barColors = [
            "rgb(236,18,69)",
            "rgba(0,152,236,0.91)",
            "rgba(1,189,132,0.91)",
            "rgba(28,28,234,0.88)",
            "rgba(17,88,236,0.89)",
            "rgba(48,205,4,0.91)",
            "rgba(5,5,85,0.88)",
            "rgba(194,1,199,0.89)",
        ];



        // Browser
        var xBrowserValues = [];
        var yBrowserValues = [];
        function AllBrowser(){
            axios.get('http://127.0.0.1:8000/getAllBrowser').then(function (res){
                for (let i=0; i< res.data.length ; i++){
                    xBrowserValues.push(res.data[i]['browsers'])
                    yBrowserValues.push(res.data[i]['count'])
                }
            }).catch(function (err){
            })
        }
        AllBrowser();
        new Chart("myChartBrowser", {
            type: "pie",
            data: {
                labels: xBrowserValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yBrowserValues,
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Browser Target",
                }
            },
        });

        // Device
        let xDdeviceValues = [];
        let yDdeviceValues = [];
        function devicename() {
            axios.get('http://127.0.0.1:8000/getAllDevice').then(function (res){
                for (let i=0; i< res.data.length ; i++){
                    xDdeviceValues.push(res.data[0][i]['device'])
                    yDdeviceValues.push(res.data[i+1])
                }
            }).catch(function (err){
            })
        }
        devicename()

        new Chart("myChartDeviceInfo", {
            type: "pie",
            data: {
                labels: xDdeviceValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yDdeviceValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Device Target"
                }
            },
        });

    </script>


    <script>
        // used for example purposes
        function getRandomIntInclusive(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        // create initial empty chart
        var ctx_live = document.getElementById("mycanvas");
        var myChart = new Chart(ctx_live, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    borderWidth: 1,
                    borderColor:'#192224',
                    label: 'liveCount',
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: "Dynamically Update Requests",
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                }
            }
        });

        // this post id drives the example data
        var postId = 1;

        // logic to get new data
        var getData = function() {
            $.ajax({
                url: '',//'http://127.0.0.1:8000/getAllDevice',
                type: 'get',
                success: function(response) {
                    myChart.data.labels.push("Request " + postId++);
                    myChart.data.datasets[0].data.push(getRandomIntInclusive(1, 50));

                    // re-render the chart
                    myChart.update();
                }
            });
        };

        // get new data every 3 seconds
        setInterval(getData, 3000);
    </script>


    </script>
    <script type="text/javascript">
        var countries = '';
        function getCountryData(){
            $.ajax({
                url:'countries.json',
                type:'get',
                success:function(res){
                    countries = JSON.parse(res);
                }
            });
        }
        getCountryData();
        $(document).ready(function(){
            $("#vmap").vectorMap({
                map: 'world_en',
                backgroundColor:'#222',
                borderColor:'#555',
                color:'#555',
                hoverOpacity:0.7,
                selectedColor:'#666666',
                enableZoom:true,
                enableDrag:true,
                showTooltip:true,
                normalizeFunction:'polynomial',
                onLabelShow:function(event,label,code){
                    code = code.toUpperCase();
                    country_name = countries[code];
                    label.html('<strong>'+country_name+'</strong>');
                }
            });
        });
    </script>

@endsection
