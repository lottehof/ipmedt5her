@if($wandelingen->count() > 0)
<table class="table">
  <caption class="table__caption">Wandelingen overzicht</caption>
  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th class="table__thead__tr__th" scope="col">Hond</th>
      <th class="table__thead__tr__th" scope="col">Hoe laat</th>
      <th class="table__thead__tr__th" scope="col">Toegewezen aan</th>
      @if ($user->role == 'ouder')
        <th class="table__thead__tr__th" scope="col">Verwijder</th>
        <th class="table__thead__tr__th" scope="col">Wijzig</th>
      @endif
    </tr>
  </thead>
  <tbody class="table__tbody">
  @foreach ($wandelingen as $wandeling)
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Hond">{{$hond->naam}}</td>
      <td class="table__tbody__tr__td" data-label="Hoe laat">{{$wandeling->uitlaat_tijd}}</td>
      <td class="table__tbody__tr__td" data-label="Toegewezen aan">
        @foreach ($familieleden as $familielid)
          @if ($wandeling->toegewezen_aan == $familielid->id)
            {{$familielid->name}} {{$familielid->surname}}
          @endif
        @endforeach
      </td>

      @if ($user->role == 'ouder')
      <td class="table__tbody__tr__td" data-label="verwijder">
        <form class="formulier" action="/settings/hond/wandeling/destroy/{{$wandeling->id}}}" method="post" onsubmit="return confirm('Wilt u deze wandeling echt verwijderen?');">
          @csrf
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="hidden" name="patch" value="" required />
          <button class="button__klein" type="submit" name="button">Verwijder</button>
        </form>
      </td>

      <td class="table__tbody__tr__td" data-label="wijzig">
        <form class="formulier" action="/settings/hond/wandeling/update/{{$wandeling->id}}" method="post">
          @csrf
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          <input type="hidden" name="patch" value="" required />

          <label class="formulier__label" for="uitlaat_tijd">Wandeltijd</label>
          <input class="formulier__input" type="time" name="uitlaat_tijd" id="uitlaat_tijd" value="{{$wandeling->uitlaat_tijd}}" required></br>

          <label class="formulier__label" for="toegewezen_aan">Toegewezen aan</label>
          <select class="formulier__input" id="toegewezen_aan" name="toegewezen_aan">
            <option class="formulier__select__option" value=""></option>
            @foreach ($familieleden as $familielid)
              @if ($wandeling->toegewezen_aan == $familielid->id)
                <option class="formulier__select__option" value="{{$familielid->name}}+{{$familielid->surname}}" selected>{{$familielid->name}} {{$familielid->surname}}</option>
              @else
                <option class="formulier__select__option" value="{{$familielid->name}}+{{$familielid->surname}}">{{$familielid->name}} {{$familielid->surname}}</option>
              @endif
            @endforeach
          </select></br>

          <button class="button__klein" type="submit" name="button">Opslaan</button>
        </form>
      </td>
      @endif

  @endforeach
      </tr>
    </tbody>
  </table>
@endif
