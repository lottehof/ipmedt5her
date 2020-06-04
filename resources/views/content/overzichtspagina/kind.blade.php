@extends('welcome')

@section('content')
<script type="text/javascript" defer src="{{URL::asset('js/progressbar.js')}}"></script>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


<h2>Overzichtspagina</h2>


<p>Progressiebalk</p>
    <div class="progressieBalk" id="balk">
      <div class="progressieBalk__fillProgress" id="fillUp">
      </div>
    </div>



<h2>Takenlijst voor vandaag</h2>


<form class="formulierCheckbox">
  <h3 class="taken__titel">Eten geven (als nodig met medicatie)</h3>
  @foreach ($voertijden as $voertijd)
  <input class="formulierCheckbox__input js--checkbox js--checkbox-voeren" type="checkbox" id="{{$voertijd->id}}" name="taken" value="Voertijd">
  <label class="formulier__label" for="{{$voertijd->id}}">Voermoment {{$voertijd->voermoment}}. Hond eten geven om {{$voertijd->voertijd}}. Geef {{$voertijd->hoeveel_voer}} gram voer.</label>
  @endforeach
  @foreach ($medicatie as $med)
  <input class="formulierCheckbox__input js--checkbox" type="checkbox" id="task6" name="taken" value="Voertijd">
  <label class="formulier__label" for="task6">Medicatie geven: {{$med->medicatie_naam}} op tijdstip {{$med->tijd}} bij het voeren. Dosis: {{$med->medicatie}}</label>
  @endforeach
  <h3 class="taken__titel">Uitlaten</h3>
  @foreach ($wandelingen as $wandeling)
  <input class="formulierCheckbox__input js--checkbox js--checkbox-wandelen" type="checkbox" id="task4" name="taken" value="Voertijd">
  <label class="formulier__label" for="task4">Hond uitlaten om {{$wandeling->uitlaat_tijd}}.</label>
  @endforeach
</form>

<section class="animationContainer" id="animationContainer">
  <img id="corgiImage" class="animationContainer__corgi" src="../media/img/CorgiZittend.png" alt="">
  <img class="animationContainer__img" src="../media/img/Grass.png" alt="">
  <lottie-player id="walkAnimation" class="animationContainer__walkAnimation" src="https://assets10.lottiefiles.com/packages/lf20_5JFpAw.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
  <lottie-player id="foodAnimation" class="animationContainer__foodAnimation" src="https://assets5.lottiefiles.com/packages/lf20_xNWu6H.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"  loop  autoplay></lottie-player>
  @if ($user->familie != '0')
    @if ($hond->id != 't')
      <!-- @include ('content.settings.hond') -->
      <!-- @include ('content.settings.voertijdenoverzicht') -->
      <!-- @include ('content.settings.medicatieoverzicht') -->
      <!-- @include ('content.settings.wandelingoverzicht') -->
      @else
      <p>Momenteel is er nog geen hond aangemeld bij uw familie. U kunt uw hond in instellingen aanmelden.</p>
    @endif
    @else
    <p>U bent momenteel nog geen lid van een familie.</p>
  @endif
</section>
@endsection
