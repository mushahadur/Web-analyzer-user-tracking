<div class="container">
    <h2>{{$userDomainName}}</h2>
    <div class="row">
        <div class="col-md-10">
            <ul class="nav nav-tabs  navbar-light">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"><i class="fas fa-chart-line"></i> Realtime</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/trackingBySite/{{$id}}"><i class="fas fa-chart-area"></i> Overview</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-th-list"></i> Behavior</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/behaviorPageIndex/{{$id}}">Pages</a></li>
                        <li><a class="dropdown-item" href="#">Landing Pages</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-bezier-curve"></i> Acquisitions</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Overview Acquisitions</a></li>
                        <li><a class="dropdown-item" href="/referrerPageIndex/{{$id}}">Referrers</a></li>
                        <li><a class="dropdown-item" href="/searchEnginePageIndex/{{$id}}">Search Engines</a></li>
                        <li><a class="dropdown-item" href="/socialNetworkPageIndex/{{$id}}">Social Networks</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-map-marked"></i> Geographic</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Overview Geographic</a></li>
                        <li><a class="dropdown-item" href="/continentsPageIndex/{{$id}}">Continents</a></li>
                        <li><a class="dropdown-item" href="/countriesPageIndex/{{$id}}">Countries</a></li>
                        <li><a class="dropdown-item" href="/viewOnMapPageIndex/{{$id}}">View Visitor IP On Map</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-laptop-house"></i> Technology</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Overview Technology</a></li>
                        <li><a class="dropdown-item" href="/operatingSystemPageIndex/{{$id}}">Operating System</a></li>
                        <li><a class="dropdown-item" href="/browserPageIndex/{{$id}}">Browsers</a></li>
                        <li><a class="dropdown-item" href="/devicePageIndex/{{$id}}">Devices</a></li>
                    </ul>
                </li>

            </ul>
        </div>



        <div class="col-md-2 d-none">
            <ul class="nav nav-tabs  navbar-light">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-calendar-alt"></i> Filter</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                    </ul>
                </li>
            </ul>
        </div>


    </div>
</div>
