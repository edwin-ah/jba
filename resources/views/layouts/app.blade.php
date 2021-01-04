<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>JBA</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
      <!-- Navbar -->
      <div id="nav-bar">
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">
              <img id="nav-logo" src="{{ URL('images/logos/jba_logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active"> 
                  <a class="nav-link" href="index.html">Hem</a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="#">Om oss</a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('projekt') }}">Projekt</a>
                  </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="#">Kontakt</a>
                </li>
                @auth
                <li class="nav-item"> 
                  <a class="nav-link" href="#">Uppdatera projekt</a>
                </li>
                <li class="nav-item"> 
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Logga ut" class="btn btn-outline-dark btn-logout">
                  </form>
                </li>
                @endauth
              </ul>
            </div>
          </div>
        </nav>
      </div>

      @yield('content')

      <!--Footer-->
      <footer>
        <div class="container-fluid padding">
            <div class="row align-items-center text-center">
                <div class="col-md-4">
                    <img class="footer-logo" src="{{ URL('images/logos/jba_footer_logo.png') }}" alt="logo">
                </div>
                <div class="col-md-4">
                    <h5>Kontakt:</h5>
                    <span>0725424064</span>
                    <br/>
                    <p>edwin.hallsten@hotmail.com</p>
                </div>
                <div class="col-md-4">
                    <h5>Länkar:</h5>
                    <a href="#">Om oss</a>
                    <br/>
                    <a href="#">Projekt</a>
                    <br/>
                    <a href="#">Kontakt</a>
                </div>
            </div>
        </div>
      </footer>
    </body>
</html>
