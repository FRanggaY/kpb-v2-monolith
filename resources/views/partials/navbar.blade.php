<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
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
    </ul>
  </nav>
