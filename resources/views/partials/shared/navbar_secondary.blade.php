<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
      <ul class="navbar-nav">
        {{-- <li class="nav-item dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
            <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
          </ul>
        </li> --}}
        <li class="nav-item {{ Request::is('/') ? 'active' : ''  }}">
          <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-book-open"></i><span>Home</span></a>
        </li>
        <li class="nav-item {{ Request::is('activity') ? 'active' : ''  }}">
          <a href="{{ url('/activity') }}" class="nav-link"><i class="far fa-calendar"></i><span>Activity</span></a>
        </li>
        <li class="nav-item {{ Request::is('gallery') ? 'active' : ''  }}">
          <a href="{{ url('/gallery') }}" class="nav-link"><i class="fas fa-image"></i><span>Gallery</span></a>
        </li>
        <li class="nav-item {{ Request::is('advertise') ? 'active' : ''  }}">
          <a href="{{ url('/advertise') }}" class="nav-link"><i class="fas fa-box"></i><span>Advertise</span></a>
        </li>
        <li class="nav-item {{ Request::is('user') ? 'active' : ''  }}">
          <a href="{{ url('user') }}" class="nav-link"><i class="fas fa-user"></i><span>User</span></a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
          <ul class="dropdown-menu">
            <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
            <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
              </ul>
            </li>
          </ul>
        </li> --}}
      </ul>
    </div>
</nav>
