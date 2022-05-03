<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ url('/') }}">KPB</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}">KPB</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>

          <li class="menu-header">Access</li>

          @if(Auth::user()->role == 'admin')
          <li class="{{ Request::is('dashboard/user') ? 'active' : '' }}"><a class="nav-link" href="{{ url('dashboard/user') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
          @endif

          <li class="{{ Request::is('dashboard/activity') || Request::is('dashboard/activity/add') ? 'active' : ''  }}"><a class="nav-link" href="{{ url('dashboard/activity') }}"><i class="far fa-calendar"></i> <span>Activity</span></a></li>
          <li class="{{ Request::is('dashboard/gallery') || Request::is('dashboard/gallery/add') ? 'active' : ''  }}"><a class="nav-link" href="{{ url('dashboard/gallery') }}"><i class="fas fa-image"></i><span>Gallery</span></a></li>
          <li class="{{ Request::is('dashboard/advertise') || Request::is('dashboard/advertise/add') ? 'active' : ''  }}"><a class="nav-link" href="{{ url('dashboard/advertise') }}"><i class="fas fa-box"></i><span>Advertise</span></a></li>

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="{{ url('documentation') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-paper-plane"></i> Documentation
          </a>
        </div>
    </aside>
  </div>
