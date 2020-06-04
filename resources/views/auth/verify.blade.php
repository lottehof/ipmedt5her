
@extends('welcome')
@section('content')

<h2>Email adres bevestigen</h2>
<p>Voordat u verder gaat, controleer u mail voor een verificatie link.</p>
<p>Als u geen mail hebt ontvangen</p>

<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="button__verifyEmail">{{ __('Klik hier om een nieuwe mail aan te vragen') }}</button>
</form>


@endsection
