@extends('shared.layout')

@section('title', 'Login')

@section('content')
{{-- Header. --}}
<div>{{ __('Login') }}</div>

{{-- Body. --}}
<div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email" >{{ __('E-Mail Address') }}</label>

            <div>
                {{-- <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus> --}}
                {{-- https://laravel.com/docs/5.7/helpers#method-old --}}
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div>
            <label for="password">{{ __('Password') }}</label>

            <div>
                {{-- <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> --}}
                <input id="password" type="password" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div>
            <div class="form-check">
                {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}

                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div>
            <div>
                <button type="submit">
                    {{ __('Login') }}
                </button>

                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
