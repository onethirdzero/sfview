@extends('shared.layout')

@section('title', 'Login')

@section('content')
<link rel="stylesheet" href="./css/app.css">

<section class="section">
    <div class="container is-fluid">
        <div class="columns is-centered">
            <div class="column is-half">
                <h3 class="title" style='color: #A6192E'>{{ __('Login') }}</h3>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- TODO: Try addons. --}}
                    {{-- https://bulma.io/documentation/form/general/#form-addons --}}
                    <div class="field">
                        <label class="label" for="email" >{{ __('E-Mail Address') }}</label>
                        <div class="control">
                            {{-- https://laravel.com/docs/5.7/helpers#method-old --}}
                            <input class="input {{ $errors->has('email') ? 'is-danger' : ''}}" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help is-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="password">{{ __('Password') }}</label>
                        <div class="control">
                            <input class="input {{ $errors->has('password') ? is-danger : '' }}" id="password" type="password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help is-danger" role="alert">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox" for="remember">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''}}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" type="submit" style='background-color: #A6192E'>
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="control">
                            <button class="button is-light" type="submit">
                                {{ __('Cancel') }}
                            </button>
                        </div>
                    </div>

                    <div class="field">
                        <a href="{{ route('password.request') }}" style='color: #A6192E'>
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section class="section">
@endsection
