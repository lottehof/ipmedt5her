@if($voertijden->count() > 0)
<table class="table">

  <caption class="table__caption">Voertijden</caption>

  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th class="table__thead__tr__th" scope="col">Voermoment</th>
      <th class="table__thead__tr__th" scope="col">Voertijd</th>
      <th class="table__thead__tr__th" scope="col">Portie voer in gram</th>
      <th class="table__thead__tr__th" scope="col">Toegewezen aan</th>
      @if ($user->role == 'ouder')
        <th class="table__thead__tr__th" scope="col">Verwijder</th>
        <th class="table__thead__tr__th" scope="col">Wijzig</th>
      @endif
    </tr>
  </thead>

  <tbody class="table__tbody">
    @foreach ($voertijden as $voertijd)
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voermoment">{{$voertijd->voermoment}}</td>
      <td class="table__tbody__tr__td" data-label="Voertijd">{{$voertijd->voertijd}}</td>
      <td class="table__tbody__tr__td" data-label="Portie voer in gram">{{$voertijd->hoeveel_voer}}</td>
      <td class="table__tbody__tr__td" data-label="Toegewezen aan">
        @foreach ($familieleden as $familielid)
          @if ($voertijd->toegewezen_aan == $familielid->id)
            {{$familielid->name}} {{$familielid->surname}}
          @endif
        @endforeach
      </td>

        @if ($user->role == 'ouder')
        <td class="table__tbody__tr__td" data-label="verwijder">
          <form class="formulier" action="/settings/hond/voertijd/destroy/{{$voertijd->id}}}" method="post" onsubmit="return confirm('Wilt u deze voertijd echt verwijderen?');">
            @csrf
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" name="patch" value="" required />
            <button class="button__klein" type="submit" name="button">Verwijder</button>
          </form>
        </td>

        <td class="table__tbody__tr__td" data-label="wijzig">
          <form class="formulier" action="/settings/hond/voertijd/update/{{$voertijd->id}}" method="post">
            @csrf
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" name="patch" value="" required />

            <label class="formulier__label" for="voertijd">Voertijd (24h notatie):</label>
            <input class="formulier__input" type="time" name="voertijd" id="voertijd" value="{{$voertijd->voertijd}}" required></br>

            <label class="formulier__label" for="hoeveel_voer">Hoeveel voer in gram:</label>
            <input class="formulier__input" type="number" name="hoeveel_voer" id="hoveel_voer" value="{{$voertijd->hoeveel_voer}}" required></br>

            <label class="formulier__label" for="toegewezen_aan">Toegewezen aan</label>
            <select class="formulier__input" id="toegewezen_aan" name="toegewezen_aan">
              <option class="formulier__select__option" value=""></option>
              @foreach ($familieleden as $familielid)
                @if ($voertijd->toegewezen_aan == $familielid->id)
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

    </tr>
    @endforeach
  </tbody>

</table>
@endif
