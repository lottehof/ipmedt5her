<h2>Account gegevens</h2>

<form class="formulier" action="/settings/{{ Auth::user()->email }}/update" method="post" onsubmit="return confirm('Wilt u deze wijzigingen aan uw account opslaan?');">
  @csrf
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  <label class="formulier__label" for="name">Voornaam:</label>
  <input class="formulier__input @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ Auth::user()->name }}" required></br>
  @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    </br>
    </br>
  @enderror

  <label class="formulier__label" for="surname">Achternaam:</label>
  <input class="formulier__input @error('surname') is-invalid @enderror" type="text" name="surname" id="surname" value="{{ Auth::user()->surname }}" required></br>
  @error('surname')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    </br>
    </br>
  @enderror

  <label class="formulier__label" for="email">Email:</label>
  <input class="formulier__input @error('email') is-invalid @enderror" type="text" name="email" value="{{ Auth::user()->email }}" required></br>
  @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    </br>
    </br>
  @enderror

  <button class="button__groot" type="submit" name="button">Sla wijzigingen op</button>
</form>
