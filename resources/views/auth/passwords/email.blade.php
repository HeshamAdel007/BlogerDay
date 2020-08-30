@extends('layouts.appAuth')

@section('content')
<div class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/">
                <b>
                    {{ config('app.name', 'Laravel') }}
                </b>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    You forgot your password? Here you can easily retrieve a new password.
                </p>
                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    {{csrf_field()}}
                    {{method_field('post')}}
                    <div class="input-group mb-3">
                        <!-- Input -->
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        {{-- Catch Error --}}
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Login</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">
                        Register a new membership
                    </a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
<!-- /.login-box -->

@endsection
