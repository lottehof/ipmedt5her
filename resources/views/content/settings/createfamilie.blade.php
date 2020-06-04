<h2>Maak een familie</h2>
<form class="formulier" action="/settings/familieleden" method="post">
  @csrf
  <label class="formulier__label" for="familienaam">Familienaam:</label>
  <input class="formulier__input" type="text" name="familienaam" value="" required></br>

  <button class="button__groot" type="submit" name="button">Maak deze familie!</button>
</form>
