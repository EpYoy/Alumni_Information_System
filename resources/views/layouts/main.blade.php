<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.styles')
  @livewireStyles
</head>

<body class="">
  <div class="wrapper ">
    @include('layouts.sidebar')
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      @include('layouts.nav')
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm"></div>
      @yield('content')
 
      @include('layouts.scripts')
      @livewireScripts
</body>

</html>
