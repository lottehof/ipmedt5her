<script type="text/javascript" defer src="{{URL::asset('js/logintab.js')}}"></script>

<section class="loginform">
  <ul class="loginform__ul">
    <li class="loginform__ul__li">
      <button href="#" class="js--active loginform__ul__li__button js--loginform-button">
        Inloggen
      </button>
    </li>
    <li class="loginform__ul__li">
      <button href="#" class="loginform__ul__li__button js--loginform-button">
        Registreren
      </button>
    </li>
  </ul>

  <article class="loginform__container">

    <!-- Login form -->
    <section class="loginform__container__content js--loginform-article js--active-panel">
      @if (Route::has('register'))
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <label for="email" class="formulier__label">{{ __('E-Mail Adres') }}</label>
          <input id="email" type="email" class="formulier__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            </br>
            </br>
          @enderror

          <label for="password" class="formulier__label">{{ __('Wachtwoord') }}</label>
          <input id="password" type="password" class="formulier__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            </br>
            </br>
          @enderror

          </br>
          <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="formulier__label" for="remember">
            {{ __('Onthoud mij') }}
          </label>

          </br>
          </br>
          <button type="submit" class="button__klein">
            {{ __('Inloggen') }}
          </button>

          @if (Route::has('password.request'))
            <a class="button__klein" href="{{ route('password.request') }}">
              {{ __('Wachtwoord vergeten?') }}
            </a>
          @endif
        </form>
      @endif
    </section>

    <!-- Register form -->
    <section class="loginform__container__content js--loginform-article">
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name" class="formulier__label col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>
        <input id="name" type="text" class="formulier__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          </br>
          </br>
        @enderror

        <label for="surname" class="formulier__label col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>
        <input id="surname" type="text" class="formulier__input @error('name') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname">
        @error('surname')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          </br>
          </br>
        @enderror

        <label for="email" class="formulier__label col-md-4 col-form-label text-md-right">{{ __('E-Mail Adres') }}</label>
        <input id="email" type="email" class="formulier__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          </br>
          </br>
        @enderror

        <label for="password" class="formulier__label col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>
        <input id="password" type="password" class="formulier__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          </br>
          </br>
        @enderror

        <label for="password-confirm" class="formulier__label col-md-4 col-form-label text-md-right">{{ __('Bevestig wachtwoord') }}</label>
        <input id="password-confirm" type="password" class="formulier__input" name="password_confirmation" required autocomplete="new-password">

        <button type="submit" class="button__klein">
        {{ __('Registreren') }}
        </button>
      </form>
    </section>
  </article>
</section>
