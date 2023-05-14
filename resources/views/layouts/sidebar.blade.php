<div class="sidebar" data-color="blue">
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      SL
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Alumni
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="{{ Request::is('layouts/dashboard') ? 'active' : '' }}">
        <a href="{{ route('layouts.dashboard') }}">
          <i class="now-ui-icons design_app"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li>
      <li class="{{ Request::is('layouts/add') ? 'active' : '' }}">
        <a href="{{ route('layouts.add') }}">
          <i class="now-ui-icons files_single-copy-04"></i>
          <p>Add Alumni</p>
        </a>
      </li>
      <li class="{{ Request::is('layouts/table') ? 'active' : '' }}">
        <a href="{{ route('layouts.table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>Table List</p>
        </a>
      </li>
      <!--<li>
      <a href="{{ ('alumni') }}" wire:click="doSomething">
        <i class="now-ui-icons education_atom"></i>
        <p>Alumni</p>
      </a>
      </li>
      <li>
        <a href="./map.html">
          <i class="now-ui-icons location_map-big"></i>
          <p>Maps</p>
        </a>
      </li>
      <li>
        <a href="./notifications.html">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>Notifications</p>
        </a>
      </li>
      <li class="{{ Request::is('layouts/profile') ? 'active' : '' }}">
      <a href="{{ route('layouts.profile') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>Edit Profile</p>
        </a>
      </li>-->
     
    </ul>
  </div>
</div>


