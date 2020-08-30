@extends('layouts.appAuth')

@section('content')
<div class="hold-transition login-page">
    <div class="login-box" style="width: 60% !important;">
        <div class="login-logo">
            <a href="/">
                <b>
                    {{ config('app.name', 'Laravel') }}
                </b>
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
                <div class="card-header">
                    {{ __('Verify Your Email Address') }}
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                          <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <div class="text-center">
                        <p>
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                        </p>
                        <p>
                            {{ __('If you did not receive the email') }},
                        </p>
                    </div>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('click here to request another') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
