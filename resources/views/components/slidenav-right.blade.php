<ul id="slide-out" class="side-nav">
  <li>
    <ul class="collapsible sidenav" data-collapsible="accordion">
      <li>
        <div class="row center">
          <h5>Settings</h5>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">account_circle</i>Account</div>
        <div class="collapsible-body">
          <ul>
            <!-- onclick="openChangePasswordView()" -->
            <li><a class="valign-wrapper" onclick="systemSettingsEdit('changePassword')"><i class="material-icons">lock</i> Change Password</a></li>
          </ul>
        </div>
      </li>
      <li>
        <div class="collapsible-header"><i class="material-icons">settings</i>System</div>
        <div class="collapsible-body">
            <ul>
                  <li ><a class="valign-wrapper" onclick="systemSettingsEdit('theme')"><i class="material-icons">color_lens</i> Theme</a></li>

                  <!-- <li ><a class="valign-wrapper"><i class="material-icons">add</i> Add User</a></li> -->
              </ul>
        </div>
      </li>
      <li>
        <div class="collapsible-header" onclick="systemSettingsEdit('widget')"><i class="material-icons">apps</i>Widget</div>
      </li>
      <li>
        <div class="collapsible-header logout"><i class="material-icons">power_settings_new</i>Logout</div>
      </li>
    </ul>
  </li>
  @include('components.footer')
</ul>

