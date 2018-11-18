@extends('shared.layout')

@section('title', 'Register')

@section('content')
<section class="section">
    <div class="container is-fluid">
        <div class="columns is-centered">
            <div class="column is-half">
                <h3 class="title">{{ __('Register') }}</h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- TODO: Try addons. --}}
                    {{-- https://bulma.io/documentation/form/general/#form-addons --}}
                    <div class="field">
                        <label class="label" for="name">{{ __('Name') }}</label>
                        <div class="control">
                            <input class="input {{ $errors->has('name') ? 'is-danger' : '' }} id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help is-danger" role="alert">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="email">{{ __('E-Mail Address') }}</label>

                        <div>
                            <input class="input {{ $errors->has('email') ? 'is-danger' : ''}}" id="email" type="email" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="is-danger" role="alert">
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
                        <label class="label" for="password-confirm" >{{ __('Confirm Password') }}</label>
                        <div class="control">
                            <input class="input" id="password-confirm" type="password" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" type="submit">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="control">
                            <button class="button is-light" type="submit">
                                {{ __('Cancel') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
