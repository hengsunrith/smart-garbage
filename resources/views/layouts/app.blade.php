<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
      ul, li {
        list-style-type: none;
        text-decoration: none;
        text-transform: none;
      }
      .logout-tropdown {
        display: none;

      }
      .logout-tropdown-hover:hover > .logout-tropdown {
        display: block;
        position: absolute;
        top: 20px;
        left: 0;
      }
      .logout-tropdown-hover:hover > .logout-tropdown a{
        color: #fff;
      }
      .user-auth, a {
        margin-left: 10px;
        color: #fff;
      }
      .max-width {
        max-width: 600px;
      }
    </style>
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:24px 0;">
          <a class="navbar-brand" href="{{ url('/home') }}">Smart-Garbage</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}">Home</a>
              </li>
              
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
            </form>

            <ul class="navbar-nav navbar-right user-auth">
            <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>  <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown  logout-tropdown-hover">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="logout-tropdown">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>    
          </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
