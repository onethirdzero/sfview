@extends('shared.layout')

@section('title', 'Send Password Reset Link')

@section('content')
<section class="section">
    <div class="container is-fluid">
        <div class="columns is-centered">
            <div class="column is-half">
                <h3 class="title">{{ __('Reset Password') }}</h3>

                @if (session('status'))
                    <div class="container">
                        <div class="notification" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="field">
                        <label class="label" for="email">{{ __('E-Mail Address') }}</label>
                        <div class="control">
                            <input class="input {{ $errors->has('email') ? 'is-danger' : ''}}" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="is-danger" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" type="submit">
                                {{ __('Send Password Reset Link') }}
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
