@extends('layouts.main')
@section('body_class', 'layout-3')
@section('page')
<div id="app">
    <div class="main-wrapper">

        <div>
          @yield('content')
        </div>

      </div>
</div>
@endsection
