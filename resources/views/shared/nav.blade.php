{{-- This is content of the nav sub-view. --}}
{{-- https://laravel.com/docs/5.7/blade#including-sub-views --}}
{{-- TODO: Style this with a responsive CSS framework. --}}
<nav>
<a href="{{ url('/') }}">SFView</a>
  <a role="button">
    <span>
  </a>
  <a>All Locations</a>
  <a>Upload</a>
  <a>About</a>
  <a>Help</a>
  @guest
    <a href="{{ route('login') }}">{{ __('Login') }}</a>
    @if (Route::has('register'))
        <a href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
  @else
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    {{-- Hidden logout form. --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  @endguest
</nav>
