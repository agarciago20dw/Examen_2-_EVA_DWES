<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.head')
	<title>@yield('title')</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

  <div class="flex-center position-ref full-height">
      <div class="content">
          <div class="title m-b-md">
              <a href="/">@lang('messages.exam')</a>
          </div>

          <div class="links">
              <!-- SI EL USUARIO TIENE EL ROL 2 (ADMIN) VER?? ESTA PESTA??A (POR DEFECTO UN USUARIO TIENE EL ROL 1) -->
              @if (Auth::user() != null && Auth::user()->rol == 2)
                <a href="{{ route('flights_show') }}">@lang('messages.administration')</a>
              @endif
              <a href="{{ route('flight_airplane_show') }}">@lang('messages.flight_plane')</a>
              <a href="{{ route('flight_user_show') }}">@lang('messages.future_flights')</a>
              <a href="{{ route('middleware_explain') }}">@lang('messages.middleware')</a>
          </div>
          <hr><br><br>
					<div class="op">
          	@yield('content')
					</div>
      </div>
  </div>

	<footer class="footer">
		@include('layouts.footer')
	</footer>

</body>
</html>
