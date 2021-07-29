<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME','SmartSchool')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
          <ul class="navbar-nav">
          @auth
              @if(Auth::guard('web')->check())
              <li class="nav-item">
                  <a href="{{ url('/admin/home') }}" class="nav-link">Admin school</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
              @elseif(Auth::guard('member')->check())
              <li class="nav-item">
                  <a href="{{ url('/account') }}" class="nav-link">My Account</a>
              </li>
              @else
              <li class="nav-item">
                  <a href="{{ route('login') }}" class="nav-link">Log in</a>
              </li>
              <li class="nav-item">
                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="ml-4 nav-link">Register</a>
                  @endif
              </li>
              @endif
          @else
              <li class="nav-item">
                <a class="nav-link" href="#section1">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('account')}}">Teacher or Student</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Admin School</a>
              </li>
          @endauth


          </ul>
        </nav>

        <div id="section1" class="container-fluid bg-wihte" style="padding-top:70px;padding-bottom:70px;height:768px">
          <div class="row">
          <div class="col-lg-8 sm-6">
            <h1>Welcome to Smart School</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. A voluptates quibusdam explicabo quidem. Eveniet, rem! Quia vel similique rerum ea deserunt doloremque dolores eligendi voluptates praesentium voluptatibus nemo, totam rem.</p>
            <button class="btn btn-lg btn-primary">Learn more</button>
          </div>
          <div class="col-lg-4 sm-6">
            <img class="img-fluid" src="{{asset('storage/images/Presentation_1.jpg')}}" alt="Chania">
          </div>
          </div>
        </div>
    </body>
</html>
