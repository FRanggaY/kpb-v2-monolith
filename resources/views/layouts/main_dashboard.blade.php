@extends('layouts.main')

@section('dashboard')
<div class="main-wrapper">
    <div class="navbar-bg"></div>

    @include('partials.navbar')
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="main-content">
      @yield('content')
    </div>

    <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Kebun Malam
      </div>
      {{-- <div class="footer-right">
        2.3.0
      </div> --}}
    </footer>

</div>
@endsection
