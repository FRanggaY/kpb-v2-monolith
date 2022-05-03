<nav class="navbar navbar-expand-lg main-navbar">
    <a href="{{ url('/') }}" class="navbar-brand sidebar-gone-hide pl-lg-5">
        <img width="30" height="30" src="{{ asset('assets/img/kpb-logo.jpg') }}" alt="">
        KPB
    </a>
    <div class="navbar-nav">
      <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="{{ url('about') }}" class="nav-link">About KPB</a></li>
        <li class="nav-item"><a href="{{ url('documentation') }}" class="nav-link">Documentation</a></li>
        <li class="nav-item"><a href="https://bit.ly/calonppkpbn" target="_blank" class="nav-link">Join Us</a></li>
      </ul>
    </div>
    <div class="ml-auto"></div>
    <ul class="navbar-nav navbar-right pr-lg-5">
      @if(Auth::user())
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        @switch(Auth::user()->profile_picture)
            @case(null)
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                @break
            @case(!null)
                <img alt="image" src="{{ asset(Auth::user()->profile_picture) }}" class="rounded-circle mr-1 " width="50" >
                @break
            @default

        @endswitch
        <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{ url('dashboard') }}" class="dropdown-item has-icon">
            <i class="fas fa-clipboard-list"></i> Dashboard
          </a>
          <a href="{{ url('settings') }}" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt py-2"></i> Logout
            </button>
          </form>
        </div>
      </li>
      @else
      <li class="nav-item">
        <a href="{{ url('login') }}" class="nav-link font-weight-bold">Login</a>
      </li>
      @endif

    </ul>
  </nav>
