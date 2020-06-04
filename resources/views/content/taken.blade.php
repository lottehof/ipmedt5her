@extends('welcome')

@section('content')
<h2>Taken</h2>
<!-- <table style="width:100%">
  <tr>
    <td>Datum</td>
    <td>Tijd</td>
    <td>Taak</td>
  </tr>
  <tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table> -->

@if ($user->familie != '0')
  @if ($hond->id != 't')
    @include ('content.settings.hond')
    @include ('content.settings.voertijdentoevoegen')
    @include ('content.settings.medicatietoevoegen')
    @include ('content.settings.wandelingtoevoegen')
    @else
    <p>Momenteel is er nog geen hond aangemeld bij uw familie. U kunt uw hond in instellingen aanmelden.</p>
  @endif
  @else
  <p>U bent momenteel nog geen lid van een familie. Ga naar instellingen om er één aan te maken of lid te worden van een al bestaande familie.</p>
@endif


@endsection
