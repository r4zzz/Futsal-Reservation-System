<header class="header-login-signup">

<div class="header-limiter">

  <h1><a href="{{ url('/') }}">Futsal<span>Imadol</span></a></h1>
  <ul class="nav navbar-nav navbar-right">
        @if (Sentinel::check())
         <li class="u-email">
          <span > @yield('user')</span>
         </li>
         <li class="lg"> 
         
         </li>
        @else
      <li><a href="/register"><span ><i class="fa fa-user" style="font-size:17px"></i></span> Register</a></li>
      <li><a href="/login"><span ><i class="fa fa-futbol-o" style="font-size:15px"></i></span> Login</a></li>
    @endif

</div>

</header>



