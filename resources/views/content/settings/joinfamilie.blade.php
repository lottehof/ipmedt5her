<h2>Join familie</h2>
<form class="formulier" action="/settings/familieleden/join" method="post">
  @csrf
  <label class="formulier__label" for="familiecode">Familiecode:</label>
  <input class="formulier__input" type="text" name="familiecode" value=""></br>

  <button class="button__groot" type="submit" name="button">Join deze familie!</button>
</form>
