@if($medicatie->count() > 0)
<table class="table">
  <caption class="table__caption">Medicatieoverzicht</caption>
  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th class="table__thead__tr__th" scope="col">Hond</th>
      <th class="table__thead__tr__th" scope="col">Medicatie</th>
      <th class="table__thead__tr__th" scope="col">Dosis</th>
      <th class="table__thead__tr__th" scope="col">Tijdstip</th>
      <th class="table__thead__tr__th" scope="col">Toegewezen aan</th>
      @if ($user->role == 'ouder')
        <th class="table__thead__tr__th" scope="col">Verwijder</th>
        <th class="table__thead__tr__th" scope="col">Wijzig</th>
      @endif
    </tr>
  </thead>
  <tbody class="table__tbody">
  @foreach ($medicatie as $med)
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Hond">{{$hond->naam}}</td>
      <td class="table__tbody__tr__td" data-label="Medicatie">{{$med->medicatie_naam}}</td>
      <td class="table__tbody__tr__td" data-label="Dosis">{{$med->medicatie}}</td>
      <td class="table__tbody__tr__td" data-label="Tijdstip">{{$med->tijd}}</td>
      <td class="table__tbody__tr__td" data-label="Toegewezen aan">
        @foreach ($familieleden as $familielid)
          @if ($med->toegewezen_aan == $familielid->id)
            {{$familielid->name}} {{$familielid->surname}}
          @endif
        @endforeach
      </td>
      @if ($user->role == 'ouder')
      <td class="table__tbody__tr__td" data-label="verwijder">
        <form class="formulier" action="/settings/hond/medicatie/destroy/{{$med->id}}}" method="post" onsubmit="return confirm('Wilt u deze medicatie echt verwijderen?');">
          @csrf
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="hidden" name="patch" value="" required />
          <button class="button__klein" type="submit" name="button">Verwijder</button>
        </form>
      </td>

      <td class="table__tbody__tr__td" data-label="wijzig">
        <form class="formulier" action="/settings/hond/medicatie/update/{{$med->id}}" method="post">
          @csrf
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          <input type="hidden" name="patch" value="" required />

          <label class="formulier__label" for="medicatie_naam">Medicatie</label>
          <input class="formulier__input" type="text" name="medicatie_naam" id="medicatie_naam" value="{{$med->medicatie_naam}}" required></br>

          <label class="formulier__label" for="medicatie">Dosis</label>
          <input class="formulier__input" type="text" name="medicatie" id="medicatie" value="{{$med->medicatie}}" required></br>

          <label class="formulier__label" for="tijd">Tijdstip</label>
          <input class="formulier__input" type="time" name="tijd" id="tijd" value="{{$med->tijd}}" required></br>

          <label class="formulier__label" for="toegewezen_aan">Toegewezen aan</label>
          <select class="formulier__input" id="toegewezen_aan" name="toegewezen_aan">
            <option class="formulier__select__option" value=""></option>
            @foreach ($familieleden as $familielid)
              @if ($med->toegewezen_aan == $familielid->id)
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
