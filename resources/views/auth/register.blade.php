@extends('shared.layout')

@section('title', 'Register')

@section('content')
<div>
    {{-- Header. --}}
    <div>{{ __('Register') }}</div>

    {{-- Body. --}}
    <div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">{{ __('Name') }}</label>

                <div>
                    {{-- <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus> --}}
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

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
                <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                </div>
            </div>

            <div>
                <div>
                    <button type="submit">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
