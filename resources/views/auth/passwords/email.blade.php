@extends('welcome2')

@section('content')

<h3>Reset je wachtwoord</h3>

  <div class="card-body">
        @if (session('status'))
                <div class="alert alert-success" role="alert">
                      {{ session('status') }}
               </div>
        @endif

          <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                            <label for="email" class="col-md-4 col-form-label text-md-right"><h4>{{ __('E-Mail Addres') }}</h4></label>


                                <input id="email" type="email" class="inputReset" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong><br>
                                    </span>
                                @enderror



                                <button type="submit" class="button__verifyEmail">
                                    {{ __('Verstuur reset wachtwoord link') }}
                                </button>

                    </form>
                </div>

@endsection
