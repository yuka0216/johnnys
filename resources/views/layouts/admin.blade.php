<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, , shrink-to-fit=no"">
  <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <!-- Styles -->
  <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ secure_asset('/lightbox/css/lightbox.min.css') }}">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d2d1d0">
    <a class="navbar-brand text-dark" href="/snowman">TOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="/all">ALL</a>
        <a class="nav-link" href="/snowman">Snow Man</a>
        <a class="nav-link" href="/sixtones">SixTONES</a>
        <a class="nav-link" href="/mypage/{{Auth::id()}}">My Page</a>
        <a class="nav-link" href="/setting">setting</a>
      </div>
    </div>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
      @endif
      @else
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
      @endguest
    </ul>
  </nav>
  <main class="py-4" background-color="black">
    @yield('content')
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!--johnnys-->
      <a class="btn btn-outline-light btn-floating m-1" href=@yield('johnnys') role="button">
        <i class="far fa-snowflake"></i>
      </a>
      <!-- avex -->
      <a class="btn btn-outline-light btn-floating m-1" href=@yield('record') role="button">
        <i class="fas fa-compact-disc"></i>
      </a>

      <!-- youtube -->
      <a class="btn btn-outline-light btn-floating m-1" href=@yield('youtube') role="button">
        <i class="fab fa-youtube"></i>
      </a>


      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href=@yield('twitter') role="button">
        <i class="fab fa-twitter"></i>
      </a>

      <!-- weibo -->
      <a class="btn btn-outline-light btn-floating m-1" href=@yield('weibo') role="button">
        <i class="fab fa-weibo"></i>
      </a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href=@yield('instagram') role="button">
        <i class="fab fa-instagram"></i>
      </a>

    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="https://www.johnnys-net.jp">Ja</a>
  </div>
  <!-- Copyright -->
</footer>

</html>