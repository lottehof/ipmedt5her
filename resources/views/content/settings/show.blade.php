@extends('welcome')

@section('content')
  <h2>Instellingen</h2>

  <!-- Familie maken / beheren stuk -->
  @if ($user->familie == '0')
    @include ('content.settings.createfamilie')
    @include ('content.settings.joinfamilie')
  @else
    @switch($user->role)
        @case('kind')

            @break

        @case('ouder')


            @break

        @default
            <p>default</p>
    @endswitch

    @include ('content.settings.familieoverzicht')

    <!-- Beheren instellingen hond voor ouders -->
    @if ($hond->id == 't')
      @include ('content.settings.maakhond')
    @else
      @include ('content.settings.hond')
      @include ('content.settings.hondafmelden')
    @endif
    @include ('content.settings.vorigehonden')
  @endif


  <!-- Beheren instellingen voor account -->

  @include ('content.settings.accountbeheren')

@endsection
