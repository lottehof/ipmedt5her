@extends('welcome')

@section('content')
<h2>Overzichtspagina</h2>
<p>Niet een ouder of kind :O</p>

<!-- BUTTON -->
<button class="button__groot">Button</button>
<button class="button__klein">Button</button>

<!-- TABELLEN -->
<table class="table">
  <caption class="table__caption">Testen</caption>
  <thead class="table__thead">
    <tr class="table__thead__tr">
      <th class="table__thead__tr__th" scope="col">Voornaam</th>
      <th class="table__thead__tr__th" scope="col">Achternaam</th>
      <th class="table__thead__tr__th" scope="col">Leeftijd</th>
    </tr>
  </thead>
  <tbody class="table__tbody">
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voornaam">Wakita</td>
      <td class="table__tbody__tr__td" data-label="Achternaam">Kingo</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">23</td>
    </tr>
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voornaam">Yabuta</td>
      <td class="table__tbody__tr__td" data-label="Achternaam">Gempachi</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">25</td>
    </tr>
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voornaam">Ichijou</td>
      <td class="table__tbody__tr__td" data-label="Achternaam">Shozaburo</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">50</td>
    </tr>
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voornaam">Fukasawa</td>
      <td class="table__tbody__tr__td" data-label="Achternaam">Masamichi</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">36</td>
    </tr>
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voornaam">Wada</td>
      <td class="table__tbody__tr__td" data-label="Achternaam">Mitsuo</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">54</td>
    </tr>
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voornaam">Natsukawa</td>
      <td class="table__tbody__tr__td" data-label="Achternaam">Koji</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">13</td>
    </tr>
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voornaam">Ida</td>
      <td class="table__tbody__tr__td" data-label="Achternaam">Chiko</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">71</td>
    </tr>
    <tr class="table__tbody__tr">
      <td class="table__tbody__tr__td" data-label="Voornaam">Yūki</td>
      <td class="table__tbody__tr__td" data-label="Achternaam">Keiji</td>
      <td class="table__tbody__tr__td" data-label="Leeftijd">31</td>
    </tr>
  </tbody>
</table>

<!-- FORMULIER  -->

<form class="formulier" action="/action_page.php">
  <label class="formulier__label" for="fname">Voornaam</label>
  <input class="formulier__input" type="text" id="fname" name="firstname" placeholder="Your name..">

  <label class="formulier__label" for="lname">Achternaam</label>
  <input class="formulier__input" type="text" id="lname" name="lastname" placeholder="Your last name..">


  <label class="formulier__label" for="country">Land</label>

  <select class="formulier__select" id="country" name="country">
    <option class="formulier__select__option" value="australia">Australië</option>
    <option class="formulier__select__option" value="canada">Canada</option>
    <option class="formulier__select__option" value="usa">USA</option>
  </select>

  <label class="formulier__label" for="subject">Onderwerp</label>
  <input class="formulier__input" type="text" id="subject" name="subject" placeholder="Subject">

  <button class="button__groot" type="submit" name="button">Verzenden</button>
</form>
@endsection
