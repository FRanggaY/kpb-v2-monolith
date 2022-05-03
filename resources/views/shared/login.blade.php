@extends('layouts.main_login')
@section('custom-style')

<style>
    // custom css
</style>

@endsection
@section('content')
<section class="section">
    <div class="container mt-2">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <a href="{{ url('/') }}"><span>Komunitas Pengawas Belajar</span></a>
                </div>

                @if (Session::get('failed'))
                <div class="btn btn-danger">
                    {{ Session::get('failed') }}
                </div>
                @endif
                @if (Session::get('success'))
                <div class="btn btn-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                <div class="card card-primary">
                    <div class="card-header"><h4>Login</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="name" class="form-control" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                Please fill in your username
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Login
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
