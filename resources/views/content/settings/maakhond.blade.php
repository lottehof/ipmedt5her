<h2>Uw hond</h2>
<p>U heeft nog geen hond! :(</p>
<p>Wilt u een hond aanmelden?</p>

<form class="formulier" action="/settings/hond/aanmelden" method="post">
  @csrf
  <label class="formulier__label" for="naam">Hoe heet uw hond?</label>
  <input class="formulier__input" type="text" name="naam" value="" required></br>

  <label class="formulier__label" for="leeftijd">Hoeveel jaar oud is uw hond?</label>
  <input class="formulier__input" type="number" name="leeftijd" value="" required></br>

  <label class="formulier__label" for="geslacht">Is uw hond een reu of een teef?</label></br>
  <select class="formulier__input" id="geslacht" name="geslacht">
    <option class="formulier__select__option" value="Reu">Reu</option>
    <option class="formulier__select__option" value="Teef">Teef</option>
  </select></br>

  <label class="formulier__label" for="gewicht">Hoe zwaar is uw hond in grammen?</label>
  <input class="formulier__input" type="number" name="gewicht" value="" required></br>

  <label class="formulier__label" for="ras">Van welk ras is uw hond?</label>
  <input class="formulier__input" type="text" name="ras" value="" required></br>

  <button class="button__groot" type="submit" name="button">Meld deze hond aan</button>
</form>
