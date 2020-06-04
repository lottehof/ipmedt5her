@if ($user->role == 'ouder')
  <h2>Voertijd toevoegen</h2>
  <form class="formulier" action="/settings/hond/voertijd/add" method="post">
    @csrf
    <label class="formulier__label" for="voertijd">Voertijd (24h notatie):</label>
    <input class="formulier__input" type="time" name="voertijd" value="" required></br>

    <label class="formulier__label" for="hoeveel_voer">Hoeveel voer in gram:</label>
    <input class="formulier__input" type="number" name="hoeveel_voer" id="hoveel_voer" value="" required></br>

    <label class="formulier__label" for="toegewezen_aan">Toegewezen aan</label>
    <select class="formulier__input" id="toegewezen_aan" name="toegewezen_aan">
      <option class="formulier__select__option" value=""></option>
      @foreach ($familieleden as $familielid)
      <option class="formulier__select__option" value="{{$familielid->name}}+{{$familielid->surname}}">{{$familielid->name}} {{$familielid->surname}}</option>
      @endforeach
    </select></br>

    <button class="button__groot" type="submit" name="button">Voeg tijd toe!</button>
  </form>
@endif
