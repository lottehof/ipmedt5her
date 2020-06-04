@extends('welcome')

@section('content')
<h2>Overzichtspagina</h2>
<!--
<table class="table">
  <caption class="table__caption">Riem detectie</caption>
  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th scope="column" class="table__thead__tr__th">Tijd</td>
      <th scope="column" class="table__thead__tr__th">Hond</td>
      <th scope="column" class="table__thead__tr__th">Riem detectie</td>
    </tr>
  </thead>
  <tbody class="table__tbody">
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Tijd">Testdate</th>
      <td class="table__tbody__tr__td" data-label="Hond">Bobby</td>
      <td class="table__tbody__tr__td" data-label="Riem detectie">riem in</td>
    </tr>

    @foreach($riemdetectie as $detectie)
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Tijd">{{$detectie->timestamp}}</th>
      <td class="table__tbody__tr__td" data-label="Hond">{{$detectie->hond}}</td>
      <td class="table__tbody__tr__td" data-label="Riem detectie">{{$detectie->riemDetectie}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<table class="table">
  <caption class="table__caption">Water detectie</caption>
  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th scope="column" class="table__thead__tr__th">Tijd</td>
      <th scope="column" class="table__thead__tr__th">Hond</td>
      <th scope="column" class="table__thead__tr__th">Waterpeil</td>
    </tr>
  </thead>
  <tbody class="table__tbody">
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Tijd">Testdate</th>
      <td class="table__tbody__tr__td" data-label="Hond">Bobby</td>
      <td class="table__tbody__tr__td" data-label="Waterpeil">Peil iets</td>
    </tr>

    @foreach($peilConditie as $conditie)
      <tr class="table__tbody__tr">
        <td class="table__tbody__tr__td" data-label="Tijd">{{$conditie->timeStamp}}</th>
        <td class="table__tbody__tr__td" data-label="Hond">{{$conditie->hond}}</td>
        <td class="table__tbody__tr__td" data-label="Waterpeil">{{$conditie->peilConditie}}</td>
      </tr>
    @endforeach

  </tbody>
</table>

<table class="table">
  <caption class="table__caption">Gewicht detectie</caption>
  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th scope="column" class="table__thead__tr__th">Tijd</td>
      <th scope="column" class="table__thead__tr__th">Hond</td>
      <th scope="column" class="table__thead__tr__th">gram in bak</td>
    </tr>
  </thead>
  <tbody class="table__tbody">
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Tijd">Testdate</th>
      <td class="table__tbody__tr__td" data-label="Hond">Bobby</td>
      <td class="table__tbody__tr__td" data-label="Gram in bak">150 gram</td>
    </tr>

    @foreach($gewichtDetectie as $detectie)
      <tr class="table__tbody__tr">
        <td class="table__tbody__tr__td" data-label="Tijd">{{$detectie->timeStamp}}</th>
        <td class="table__tbody__tr__td" data-label="Hond">{{$detectie->hond}}</td>
        <td class="table__tbody__tr__td" data-label="Waterpeil">{{$detectie->gewicht}}</td>
      </tr>
    @endforeach

  </tbody>
</table> -->

@if ($user->familie != '0')
  @if ($hond->id != 't')
    @include ('content.settings.hond')
    @include ('content.settings.voertijdenoverzicht')
    @include ('content.settings.medicatieoverzicht')
    @include ('content.settings.wandelingoverzicht')
    @else
    <p>Momenteel is er nog geen hond aangemeld bij uw familie. U kunt uw hond in instellingen aanmelden.</p>
  @endif
  @else
  <p>U bent momenteel nog geen lid van een familie.</p>
@endif

@endsection
