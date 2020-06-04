@if ($user->role == 'ouder')
  <h2>Wandeling toevoegen</h2>
  <form class="formulier" action="/settings/hond/wandeling/add" method="post">
    @csrf
    <label class="formulier__label" for="uitlaat_tijd">Wandeltijd</label>
    <input class="formulier__input" type="time" name="uitlaat_tijd" id="uitlaat_tijd" value="" required></br>

    <label class="formulier__label" for="toegewezen_aan">Toegewezen aan</label>
    <select class="formulier__input" id="toegewezen_aan" name="toegewezen_aan">
      <option class="formulier__select__option" value=""></option>
      @foreach ($familieleden as $familielid)
      <option class="formulier__select__option" value="{{$familielid->name}}+{{$familielid->surname}}">{{$familielid->name}} {{$familielid->surname}}</option>
      @endforeach
    </select></br>

    <button class="button__groot" type="submit" name="button">Voeg wandeling toe</button>
  </form>
@endif
