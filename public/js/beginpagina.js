
//console.log("hallo");
//console.log(peilConditie[peilConditie.length-1]);
console.log($hondDetectie);
console.log("hond detectie " + hondDetectie4);
//wateersensor
//for each loop met if statement die check of waarde die sensor ophaalt gelijk is aan .. zo ja wordt dat geprint op pagina
for (var i = 0; i < peilConditie3.length; i++) {


if(peilConditie3 === "Water level: 0mm - Empty!" ){
  document.getElementById('peilConditie').innerHTML = "Water level: 0mm - Empty!";

} else if (peilConditie3 === "Water level: 0 mm to 5 mm") {
        document.getElementById('peilConditie').innerHTML = "Water level: 0mm to 5mm";

} else if (peilConditie3 === "Water level: 5 mm to 10mm") {
        document.getElementById('peilConditie').innerHTML = "Water level: 5mm to 10mm";

}  else if (peilConditie3 === "Water level: 10mm to 15mm") {
        document.getElementById('peilConditie').innerHTML = "Water level: 10mm to 15mm";

} else if (peilConditie3 === "Water level: 15mm to 20mm") {
        document.getElementById('peilConditie').innerHTML = "Water level: 15mm to 20mm";

} else if (peilConditie3 === "Water level: 20mm to 25mm") {
        document.getElementById('peilConditie').innerHTML = "Water level: 20mm to 25mm";

} else if (peilConditie3 === "Water level: 25mm to 30mm") {
        document.getElementById('peilConditie').innerHTML = "Water level: 25mm to 30mm";

} else if(peilConditie3 === "Water level: 30mm to 35mm"){
        document.getElementById('peilConditie').innerHTML = "Water level: 30mm to 35mm";

} else if(peilConditie3 === "Water level: 35mm to 40mm"){
        document.getElementById('peilConditie').innerHTML = "Water level: 35mm to 40mm";

}else {
    document.getElementById('peilConditie').innerHTML = "Waarde waterlevel onbekend";
}

}
//druksensor
for (var i = 0; i < riemdetectie4.length; i++) {
  if(riemdetectie4 === "riem in" ){
    document.getElementById('riemDetectie').innerHTML = "Riem in";

  } else if (riemdetectie4 === "riem uit") {
          document.getElementById('riemDetectie').innerHTML = "Riem uit";
  } else{
    document.getElementById('riemDetectie').innerHTML = "Niks gedetecteerd";
  }
}

//Detectiesensor
for (var i = 0; i < hondDetectie4.length; i++){
  if(hondDetectie === "De hond staat niet voor de bak" ){
    document.getElementById('hondDetectie').innerHTML = "De hond staat niet voor de bak";
} else if(hondDetectie === "De hond staat voor de bak") {
        document.getElementById('hondDetectie').innerHTML = "De hond staat voor de bak";
      }
  else {
      document.getElementById('hondDetectie').innerHTML = "Detectie van de hond is onbekend";
        }
//gewichtsensor
let circlegewicht = document.getElementById('circlegewicht');
//circlegewicht.setAttribute('stroke-dasharray', gewichtConditie4 + ', 100' );
console.log(gewichtConditie4.length);
if(gewichtConditie4.length == 2){
  document.getElementById('gewicht').innerHTML = "Geen gewicht";

} else{
  document.getElementById('gewicht').innerHTML = gewichtConditie4;
}
