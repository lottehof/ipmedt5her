@if ($user->role == 'ouder')
<form class="formulier" action="/settings/hond/afmelden/{{$hond->id}}" method="post" onsubmit="return confirm('Wilt u uw hond echt afmelden?');">
  @csrf
  <button class="button__groot" type="submit" name="button">{{$hond->naam}} afmelden</button>
</form>
@endif
