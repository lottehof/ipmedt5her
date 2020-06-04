@extends('welcome')

@section('content')

  @if ($user->role == 'kind')
    @include('content.overzichtspagina.kind')
  @elseif ($user->role == 'ouder')
    @include('content.overzichtspagina.ouder')
  @else
  <h2>Overzichtspagina</h2>
  <p>U bent momenteel nog geen lid van een familie. Ga naar instellingen om er één aan te maken of lid te worden van een al bestaande familie.</p>
  @endif
@endsection
