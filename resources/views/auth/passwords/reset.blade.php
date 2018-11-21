@extends('shared.layouts')

@section('title', 'Password Reset')

@section('content')
<link rel="stylesheet" href="../css/app.css">

<section class="section">
    <div class="container is-fluid">
        <div class="columns is-centered">
            <div class="column is-half">

            </div>
        </div>
    </div>
</section>

<h3 class="title" style='color: #A6192E'>{{ __('Reset Password') }}</h3>

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="field">
        <label class="label" for="email">{{ __('E-Mail Address') }}</label>
        <div class="control">
            {{-- Double question marks is the null coalesce operator. It
            returns the first value which exists and is not null. --}}
            {{-- https://lornajane.net/posts/2015/new-in-php-7-null-coalesce-operator --}}
            <input class="input {{ errors->has('email') ? 'is-danger' : '' }}" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>

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
            <input class="input {{ $errors->has('password') ? 'is-danger' ? '') }} id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <span class="is-danger" role="alert">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>
    </div>

    <div class="field">
        <label class="label" for="password-confirm">{{ __('Confirm Password') }}</label>
        <div class="control">
            <input class="input" id="password-confirm" type="password" name="password_confirmation" required>
        </div>
    </div>

    <div class="field is-grouped">
        <div class="control">
            <button class="button is-link" type="submit">
                {{ __('Reset Password') }}
            </button>
        </div>
        <div class="control">
            <button class="button is-light" type="submit">
                {{ __('Cancel') }}
            </button>
        </div>
    </div>
</form>
@endsection
