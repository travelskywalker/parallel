<div class="navbar-fixed" id="nav_main">

    <nav class="nav-extended">
        <div class="nav-wrapper">
          <div class="hide-on-med-and-down">
            <a href="/home" class="brand-logo right">Parallel </a>
            <a class="right school-logo"></a>
          </div>
          @if(Auth::check())
          <ul id="nav-mobile" class="hide-on-small-only left">
            <li><a href="/admin">Admin</a></li>
            <li><a href="/school">School</a></li>
            <li><a href="/student">Student</a></li>
            <li><a href="/teacher">Teacher</a></li>
            <li><a href="/classes">Class</a></li>
            <li><a href="/section">Section</a></li>
            <li><a href="/admission">Admission</a></li>
            <li><a onclick="opensearch()"><i class="material-icons">search</i></a></li>
          </ul>
          @endif
        </div>
        
            <div class="nav-content">
              <ul class="tabs tabs-transparent sub-nav">
                @yield('sub-bar')

                <li class="right system-tab right-align hide-on-small-only">
                    <div id="system-clock">
                    </div>
                    <div >
                        logged in as <span id="system_user" class="button-collapse" data-activates="slide-out"></span>
                    </div>
                </li>
              </ul>
            </div>

            <!-- change password tutorial structure -->
            <div class="tap-target change-password" data-activates="settings_btn">
              <div class="tap-target-content">
                <h5>Change Password</h5>
                <p>Please click here to change your password</p>
              </div>
            </div>
            
        
    </nav>
</div>