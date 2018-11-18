@extends('layouts.app')

@section('content')
<div>
    {{-- Header. --}}
    <div>{{ __('Reset Password') }}</div>

    <div>
        @if (session('status'))
            {{-- Notification. --}}
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div>
                    {{-- <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required> --}}
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div>
                <div>
                    <button type="submit">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
