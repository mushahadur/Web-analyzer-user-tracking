<div class="row">
    <div class="col-md-4">
        <div class="card text-white" style="width: 18rem;">
            <div class="card-body bg-info">
                <span><h5 class="card-title font-weight-bold">Total Page Visitor  <i class="fas fa-users pl-5"></i></h5></span>
                <p class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> {{$totalVisitorPercent}}%</p>
                <p class="float-right pr-3">{{$totalVisitor}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white" style="width: 18rem;">
            <div class="card-body bg-success">
                <span><h5 class="card-title font-weight-bold">Real Page Visitor   <i class="fas fa-user-check pl-5"></i></h5></span>
                @if($realVisitorPercent > $FakeVisitorPercent)
                    <p class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrow-circle-up "></i>  {{$realVisitorPercent}}%</p>
                @elseif($realVisitorPercent == $FakeVisitorPercent)
                    <p class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrows-alt-h"></i>  {{$realVisitorPercent}}%</p>
                @else
                    <p class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrow-circle-down "></i>  {{$realVisitorPercent}}%</p>
                @endif
                <h5 class="float-right pr-3">{{$realVisitor}}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white" style="width: 18rem;">
            <div class="card-body bg-danger">
                <span><h5 class="card-title font-weight-bold">Fake Page Visitor  <i class="fas fa-users-slash pl-5"></i></h5></span>
                @if($realVisitorPercent < $FakeVisitorPercent)
                    <p class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrow-circle-up "></i>  {{$FakeVisitorPercent}}%</p>
                @elseif($realVisitorPercent == $FakeVisitorPercent)
                    <p class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrows-alt-h"></i>  {{$FakeVisitorPercent}}%</p>
                @else
                    <p class="pl-3 d-inline"><i class="fas fa-chart-bar"></i> <i class="fas fa-arrow-circle-down "></i>  {{$FakeVisitorPercent}}%</p>
                @endif
                <h5 class="float-right pr-3">{{$totalFakeVisitor}}</h5>
            </div>
        </div>
    </div>
</div>
