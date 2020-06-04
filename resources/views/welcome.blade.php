<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::asset('css/main.min.css')}}">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('media/icon/favicon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('media/icon/favicon/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('media/icon/favicon/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('media/icon/favicon/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('media/icon/favicon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('media/icon/favicon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('media/icon/favicon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('media/icon/favicon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('media/icon/favicon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{URL::asset('media/icon/favicon/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('media/icon/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('media/icon/favicon/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('media/icon/favicon/favicon-16x16.png')}}">
        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="{{URL::asset('media/icon/favicon/ms-icon-144x144.png')}}">
        <meta name="theme-color" content="#000000">
    </head>
    <body>
        <main class=container>
          <section class="container__section">

            <h1>{{ config('app.name', 'Laravel') }}</h1>

            @if (Route::has('login'))
                  @auth
                    @include('homepage.ingelogd')
                    @yield('content')
                  @else
                    @include('homepage.login')
                  @endauth
            @endif

          </section>
        </main>

        <nav class="menu">
          <button onclick="window.location.href = '/'" class="menu__button" type="submit" name="home">
            <img class="menu__button__img" src="../media/icon/home.svg"></img>
            <p class="menu__button__text">Home</p>
          </button>

          <button onclick="window.location.href = '/settings'" class="menu__button" type="submit" name="settings">
            <img class="menu__button__img" src="../media/icon/settings.svg"></img>
            <p class="menu__button__text">Instellingen</p>
          </button>

          <button onclick="window.location.href = '/taken'" class="menu__button" type="submit" name="taken">
            <img class="menu__button__img" src="../media/icon/list.svg"></img>
            <p class="menu__button__text">Taken invullen</p>
          </button>

          <button onclick="window.location.href = '/overzichtspagina'" class="menu__button" type="submit" name="overzicht">
            <img class="menu__button__img" src="../media/icon/calendar.svg"></img>
            <p class="menu__button__text">Overzicht</p>
          </button>

          <button onclick="window.location.href = '/messages'" class="menu__button" type="submit" name="overzicht">
            <img class="menu__button__img" src="../media/icon/chat.svg"></img>
            <p class="menu__button__text">Berichten</p>
          </button>

          @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button class="menu__button" type="button" name="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <img class="menu__button__img" src="../media/icon/logout.svg"></img>
              <p class="menu__button__text">Uitloggen</p>

            </button>
          @endauth
        </nav>

    </body>
</html>
