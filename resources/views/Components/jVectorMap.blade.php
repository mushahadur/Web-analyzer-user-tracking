

        <div class="col-md-8">
            <div class="ibox card">
                <div class="ibox-head card-header">
                    <div class="ibox-title">Visitors Statistics</div>
                </div>
                <div class="ibox-body">
                    <div class="p-3" id="world-map" style="height: 300px;"></div>
                </div>
            </div>

            <div class="my-2">
                <h4>Top Visitors by Country</h4>
                <table class="table table-striped m-t-20 visitors-table">
                    <thead>
                    <tr>
                        <th>Country</th>
                        <th>Total Visitor</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allCountryInfo as $con)
                    <tr>
                        <td>
                            <img class="m-r-10" width="25px" height="25px" src="{{$con->flag_img}}" /> {{$con->country}}
                        </td>
                        <td>{{$con->count}}</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" style="width:{{$con->count}}%; height:5px;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="progress-parcent">{{$con->count / 100}}%</span>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-6 card d-none">
            <div class="ibox card-body">
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        <div>
                            <h3 class="m-0">Statistics</h3>
                            <div>Your shop sales analytics</div>
                        </div>
                        <div class="d-inline-flex">
                            <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                <div class="text-muted">WEEKLY INCOME</div>
                                <div>
                                    <span class="h2 m-0">$850</span>
                                    <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25% </span>
                                </div>
                            </div>
                            <div class="px-3">
                                <div class="text-muted">WEEKLY SALES</div>
                                <div>
                                    <span class="h2 m-0">240</span>
                                    <span class="text-warning ml-2"><i class="fa fa-level-down"></i> -12% </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none">
                        <canvas id="bar_chart" style="height:260px;"></canvas>
                    </div>
                </div>
            </div>
        </div>




