<style>
.navbar{
  background-color: black;
}

</style>

{{-- This is content of the nav sub-view. --}}
{{-- https://laravel.com/docs/5.7/blade#including-sub-views --}}
<nav class="navbar is-black" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ url('/') }}">
      <strong>SFView</strong>
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu"
      aria-expanded="false" data-target="navbarMenu">
      {{-- The data-target specifies where the right side of the navbar is,
      so that our Javascript can unhide/hide the menu on tap, on mobile screens. --}}
      {{-- The spans visualize the three hamburger lines or cross. --}}
      {{-- https://bulma.io/documentation/components/navbar/#navbar-burger --}}
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div class="navbar-menu" id="navbarMenu">
    <div class="navbar-start">

      <a class="navbar-item" href="{{ route('locations') }}">
        {{ __('All Locations') }}
      </a>

      <a class="navbar-item" href="{{ route('upload') }}">
        {{ __('Upload') }}
      </a>

      <a class="navbar-item" href="{{ route('about') }}">
        {{ __('About') }}
      </a>

      <a class="navbar-item" href="{{ route('help') }}">
        {{ __('Help') }}
      </a>

    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <div>
          <?php
          if (!is_null(Auth::user()))
          {
              echo "<p style='padding-right: 25px; margin-top: 5px; font-size: 18px'>".Auth::user()->name."</p>";
          }
          ?>
          </div>
          @guest
            @if (Route::has('register'))
              <a style='background-color: #A6192E' class="navbar-item button is-primary" href="{{ route('register') }}">
                <strong>{{ __('Sign Up') }}</strong>
              </a>
            @endif
            <a class="navbar-item button is-light" href="{{ route('login') }}">
              {{ __('Login') }}
            </a>
          @else
            <a class="navbar-item button is-light" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            {{-- Hidden logout form. --}}
            <form id="logout-form" action="{{ route('logout') }}"
              method="POST" style="display: none;">
              @csrf
            </form>
          @endguest
        </div>
      </div>
    </div>
  </div>
</nav>
