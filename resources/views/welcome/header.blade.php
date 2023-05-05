
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

     <a href="index.html" class="logo me-auto"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <!--<li><a class="nav-link scrollto" href="#services">Services</a></li>-->
          <!--<li><a class="nav-link scrollto" href="#portfolio">Events</a></li>-->
          <!--<li><a class="nav-link scrollto" href="#team">Officials</a></li>-->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="scrollto" href="https://facebook.com/groups/1426800230885625" target="_blank"><img src="{{ asset('assets/img/fbs.png') }}" alt="SNSU Youtube Channel" width="45px" class="rounded">Facebook Page</a></li> 
          <li class="dropdown"><a href="#"><span>Admin</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('login') }}">Log In</a></li>
              <li><a href="{{ route('register') }}">Sign Up</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  