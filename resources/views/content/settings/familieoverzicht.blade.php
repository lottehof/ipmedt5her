<article class="attentioncard">
  <section class="attentioncard__title">
    Familiecode
  </section>
  <section class="attentioncard__content">
    <p>Indien iemand lid wilt worden van uw familie dient u de volgende code met hun te delen:</p>
    <br/>
    <h3>{{$user->familie}}</h3>
  </section>
</article>
<table class="table">
  <caption class="table__caption">Familieleden van {{$familie->familienaam}}:</caption>
  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th class="table__thead__tr__th" scope="col">Voornaam</th>
      <th class="table__thead__tr__th" scope="col">Achternaam</th>
      <th class="table__thead__tr__th" scope="col">Rol</th>
      @if ($user->role == 'ouder')
      <th class="table__thead__tr__th" scope="col">Verwijder</th>
      @endif
    </tr>
  </thead>
  <tbody class="table__tbody">
    @foreach ($familieleden as $familielid)
      <tr class="table__tbody__tr">
        <td class="table__tbody__tr__td" data-label="Voornaam">{{$familielid->name}}</td>
        <td class="table__tbody__tr__td" data-label="Achternaam">{{$familielid->surname}}</td>
        <td class="table__tbody__tr__td" data-label="Rol">{{$familielid->role}}</td>
        @if ($user->role == 'ouder')
        <td class="table__tbody__tr__td" data-label="Verwijder">
          @if ($user->email != $familielid->email)
          <form class="formulier" action="/settings/familieleden/removemember/{{$familielid->email}}" method="post">
            @csrf
            <button class="button__klein" type="submit" name="button" onsubmit="return confirm('Wilt u dit familielid echt verwijderen?');">Verwijder</button>
          </form>
          @endif
        </td>
        @endif
      </tr>
    @endforeach
  </tbody>
</table>

@if ($user->role == 'ouder')
<form class="formulier" action="/settings/familieleden/leave" method="post" onsubmit="return confirm('Wilt U echt deze familie verlaten?');">
  @csrf
  <button class="button__groot" type="submit" name="button">De familie {{$familie->familienaam}} verlaten</button>
</form>
@endif
