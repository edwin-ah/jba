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
      <!--Google Web Fonts-->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@600&display=swap" rel="stylesheet">
    </head>
    <body>
      <div class="navbarBg">
        <!-- Navbar -->
        <div id="nav-bar" class="mx-5">
          <nav class="navbar navbar-expand-md navbar-light sticky-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('index') }}">
                <img id="nav-logo" src="{{ URL('images/logos/jba_logo.png') }}" alt="logo" class="rounded">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item"> 
                    <a class="nav-link rounded-pill {{ '/' == request()->path() ? 'active' : ''}}" href="{{ route('index') }}">&nbsp;Hem&nbsp;</a>
                  </li>
                  <li class="nav-item"> 
                    <a class="nav-link rounded-pill {{ 'om-oss' == request()->path() ? 'active' : ''}}" href="{{ route('about') }}">Om oss</a>
                  </li>
                  <li class="nav-item"> 
                      <a class="nav-link rounded-pill {{ 'projekt' == request()->path() ? 'active' : ''}}" href="{{ route('project') }}">Projekt</a>
                    </li>
                  <li class="nav-item"> 
                    <a class="nav-link rounded-pill {{ 'kontakta-oss' == request()->path() ? 'active' : ''}}" href="{{ route('contact') }}">Kontakt</a>
                  </li>
                  @auth
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
      </div>
      
      @yield('content')
      <!--Footer-->
      <footer id="footer">
        <div class="container-fluid padding">
            <div class="row align-items-center text-center">
                <div class="col-md-4">
                    <img class="footer-logo" src="{{ URL('images/logos/jba_logo_footer.png') }}" alt="logo">
                </div>
                <div class="col-md-4 footer-contact">
                    <h5>Kontakt:</h5>
                    <span>0705904854</span>
                    <br/>
                    <p>jba-johannes@hotmail.com</p>
                </div>
                <div class="col-md-4 footer-links">
                    <h5>Länkar:</h5>
                    <a href="{{ route('about') }}">Om oss</a>
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
