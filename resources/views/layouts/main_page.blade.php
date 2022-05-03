@extends('layouts.main')
@section('body_class', 'layout-3')
@section('page')
<div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
        @include('partials.shared.navbar_primary')
        @include('partials.shared.navbar_secondary')

      <div class="main-content">
        @yield('content')
      </div>

    </div>
    @include('partials.shared.footer')
</div>
@endsection
