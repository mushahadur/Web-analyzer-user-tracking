<nav class="navbar navbar-expand-lg navbar-white my-nav-color">
    <button type="button" id="sidebarCollapse" class="btn btn-light">
        <i class="fas fa-bars"></i><span></span>
    </button>
    <div class=" navbar-collapse" id="navbarSupportedContent">
        <ul class="nav ms-auto">
            <li class="nav nav-item dropdown">
                <div class="nav nav-dropdown">
                    <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> <span>{{session()->get('userName')}}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                        <ul class="nav-list">
                            <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                            <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                            <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="{{url('/logOut')}}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
