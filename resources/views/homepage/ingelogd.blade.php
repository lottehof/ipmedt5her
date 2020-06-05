
@section('content')
<script type="text/javascript">
//watersensor
  let obj = {!! json_encode($peilConditie ?? '') !!};
  let peilConditie = JSON.stringify(obj); //zet json om naar string
  let peilConditie2 = peilConditie.slice(peilConditie.length - 28); // haalt de eerst 28 elementen van array
  let peilConditie3 = peilConditie2.replace('"}]', ""); //haalt "}] weg en vervangt het met niks

//gewichtsensor
  let gewicht = {!! json_encode($gewichtDetectie ?? '') !!};
  let gewichtConditie = JSON.stringify(gewicht);  //zet json om naar string
  let gewichtConditie2 = gewichtConditie.slice(gewichtConditie.length - 15); // haalt de eerst 14 elementen van array
  let gewichtConditie3 = gewichtConditie2.replace('"}]', "");  //haalt "}] weg en vervangt het met niks
  let gewichtConditie4 = gewichtConditie3.replace(':"', ""); //haalt :" weg en vervangt het met niks
//  console.log(gewichtConditie3);
//  let gewichtConditie5 = gewichtConditie4.replace('"');

//druksensor
  let riem = {!! json_encode($riemdetectie ?? '') !!};
  let riemDetectie = JSON.stringify(riem);  //zet json om naar string
   let riemDetectie2 = riemDetectie.slice(riemDetectie.length - 11); // haalt de eerst 11 elementen van array
   let riemDetectie3 = riemDetectie2.replace('"}]', "");  //haalt "}] weg en vervangt het met niks
   let riemdetectie4 = riemDetectie3.replace('"', ""); //haalt " weg en vervangt het met niks

//detectiesensor
  let detectie = {!! json_encode($hondDetectie ?? '') !!};
  let hondDetectie = JSON.stringify(detectie);
  let hondDetectie2 = hondDetectie.slice(hondDetectie.length - 11);
  let hondDetectie3 = hondDetectie2.replace('"}]', "");
  let hondDetectie4 = hondDetectie3.replace('"', "");





</script>
<script type="text/javascript" defer src="{{URL::asset('js/beginpagina.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<h2>Home</h2>

<div class="grid-front">

  <div class="grid-item">
    <section>
      <h3>Hoeveelheid gewicht in bak</h3>
      <!-- <canvas id="doughnut-chart" width="500" height="450"></canvas> -->


      <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="250" height="250" xmlns="http://www.w3.org/2000/svg">
        <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
        <circle class="circle-chart__circle" id="circlegewicht" stroke="#00acc1" stroke-width="2" stroke-dasharray="" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
        <g class="circle-chart__info">
          <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="4" id="gewicht">Geen gewicht<text>
          <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="2">gram</text>
        </g>
      </svg>


    </section>


  </div>
  <div class="grid-item">
    <h3>Waterpeil conditie</h3>

    <h2 class="peilConditie" id="peilConditie" alignment-baseline="central" text-anchor="middle" font-size="4"></h2>
  </div>
  <div class="grid-item">
    <h3>Riem detectie</h3>

    <h2 class="riemDetectie" id="riemDetectie" alignment-baseline="central" text-anchor="middle" font-size="4"></h2>
  </div>
  <div>
    <h3>Detectie van de hond</h3>
    <h2 class="hondDetectie" id="hondDetectie" alignment-baseline="central" text-anchor="middle" font-size="4" ></h2>
  </div>

</div>




@endsection
