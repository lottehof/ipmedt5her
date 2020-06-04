@if ($user->role == 'ouder')
  <h2>Medicatie toevoegen</h2>
  <form class="formulier" action="/settings/hond/medicatie/add" method="post">
    @csrf
    <label class="formulier__label" for="medicatie_naam">Medicatie</label>
    <input class="formulier__input" type="text" name="medicatie_naam" id="medicatie_naam" value="" required></br>

    <label class="formulier__label" for="medicatie">Dosis</label>
    <input class="formulier__input" type="text" name="medicatie" id="medicatie" value="" required></br>

    <label class="formulier__label" for="tijd">Tijdstip</label>
    @if($voertijden->count() > 0)
    <select class="formulier__input" id="tijd" name="tijd">
      @foreach ($voertijden as $voertijd)
      <option class="formulier__select__option" value="{{$voertijd->voertijd}}">Voermoment {{$voertijd->voermoment}}: {{$voertijd->voertijd}}</option>
      @endforeach
    </select></br>
    @else
      <input class="formulier__input" type="time" name="tijd" id="tijd" value="" required></br>
    @endif

    <label class="formulier__label" for="toegewezen_aan">Toegewezen aan</label>
    <select class="formulier__input" id="toegewezen_aan" name="toegewezen_aan">
      <option class="formulier__select__option" value=""></option>
      @foreach ($familieleden as $familielid)
      <option class="formulier__select__option" value="{{$familielid->name}}+{{$familielid->surname}}">{{$familielid->name}} {{$familielid->surname}}</option>
      @endforeach
    </select></br>
    <button class="button__groot" type="submit" name="button">Voeg medicatie toe</button>
  </form>
@endif
