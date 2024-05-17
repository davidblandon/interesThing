@extends('layouts.login')

@section('content')
<div class="container-lg mt-5"> <!-- Cambié container por container-lg -->
    <div class="row justify-content-center">
        <div class="col-lg-8"> <!-- Cambié col-lg-6 por col-lg-8 -->
            <div class="card" style="background-color: #F9DE96">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" style="background-color: #71A06C" class="btn btn-primary">{{ __('Login') }}</button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" style="color: #71A06C" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3">
                @if(session()->has('success_msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success_msg') }}
                    </div>
                @endif
                <p>You're already registered.</p>
            </div>
        </div>
    </div>
</div>
@endsection
