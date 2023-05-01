<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <img src="{{asset('front/system')}}/assets/img/logo.png" alt="bootraper logo" class="app-logo">
    </div>
    <ul class="list-unstyled components text-secondary">
        <li><a href="{{url('/dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>


        <li class="d-none">
            <a href="#uielementsmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i> Elements</a>
            <ul class="collapse list-unstyled" id="uielementsmenu">
                <li><a href="ui-buttons.html"><i class="fas fa-angle-right"></i> Buttons</a></li>
                <li><a href="ui-badges.html"><i class="fas fa-angle-right"></i> Badges</a></li>
                <li><a id="myIdOne" ><i class="fas fa-angle-right"></i> My Test</a></li>
                <li><a href="ui-cards.html"><i class="fas fa-angle-right"></i> Cards</a></li>
                <li><a href="ui-alerts.html"><i class="fas fa-angle-right"></i> Alerts</a></li>
                <li><a href="ui-tabs.html"><i class="fas fa-angle-right"></i> Tabs</a></li>
                <li><a href="ui-date-time-picker.html"><i class="fas fa-angle-right"></i> Date & Time Picker</a></li>
            </ul>
        </li>
        <li class="d-none">
            <a href="#authmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Authentication</a>
            <ul class="collapse list-unstyled" id="authmenu">
                <li>
                    <a href="login.html"><i class="fas fa-lock"></i> Login</a>
                </li>
                <li>
                    <a href="signup.html"><i class="fas fa-user-plus"></i> Signup</a>
                </li>
                <li>
                    <a href="forgot-password.html"><i class="fas fa-user-lock"></i> Forgot password</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
