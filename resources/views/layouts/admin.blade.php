<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
        <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand text-dark" href="http://127.0.0.1:8080/">TOP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8080/all">ALL</a>
                        <a class="nav-link" href="http://127.0.0.1:8080/snowman">Snow Man</a>
                        <a class="nav-link" href="http://127.0.0.1:8080/sixtones">SixTONES</a>
                    </div>
                </div>
            </nav>
            
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
            <div className="h-16 flex items-center md:max-w-screen-md md:mx-auto">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </div>
            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!--johnnys-->
                    <a class="btn btn-outline-light btn-floating m-1" href= @yield('johnnys') role="button">
                        <i class="far fa-snowflake"></i>
                    </a>
                    <!-- avex -->
                    <a class="btn btn-outline-light btn-floating m-1" href= @yield('record') role="button">
                        <i class="fas fa-compact-disc"></i>
                    </a>

                    <!-- youtube -->
                    <a class="btn btn-outline-light btn-floating m-1" href= @yield('youtube') role="button">
                        <i class="fab fa-youtube"></i>
                    </a>
                    

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href= @yield('twitter') role="button">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <!-- weibo -->
                    <a class="btn btn-outline-light btn-floating m-1" href= @yield('weibo') role="button">
                        <i class="fab fa-weibo"></i>
                    </a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href= @yield('instagram') role="button">
                        <i class="fab fa-instagram"></i>
                    </a>

                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="https://www.johnnys-net.jp">johnny&Associates.</a>
            </div>
        <!-- Copyright -->
        </footer>
    </body>
</html>