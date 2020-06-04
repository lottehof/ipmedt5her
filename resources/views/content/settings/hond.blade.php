<table class="table">
  <caption class="table__caption">Uw hond </caption>
  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th class="table__thead__tr__th" scope="col">Naam</th>
      <th class="table__thead__tr__th" scope="col">Leeftijd</th>
      <th class="table__thead__tr__th" scope="col">Geslacht</th>
      <th class="table__thead__tr__th" scope="col">Gewicht in gram</th>
      <th class="table__thead__tr__th" scope="col">Ras</th>
    </tr>
  </thead>
  <tbody class="table__tbody">
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Naam">{{$hond->naam}}</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">{{$hond->leeftijd}}</td>
      <td class="table__tbody__tr__td" data-label="Geslacht">{{$hond->geslacht}}</td>
      <td class="table__tbody__tr__td" data-label="Gewicht in gram">{{$hond->gewicht}}</td>
      <td class="table__tbody__tr__td" data-label="Ras">{{$hond->ras}}</td>
    </tr>
  </tbody>
</table>
