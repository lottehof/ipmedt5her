const task1 = document.getElementById("task1");
const task2 = document.getElementById("task2");
const task3 = document.getElementById("task3");
const task4 = document.getElementById("task4");
const task5 = document.getElementById("task5");
const fill = document.getElementById('fillUp');
const balk = document.getElementById('balk');
const checkbox = document.getElementsByClassName('js--checkbox');
const checkboxVoeren = document.getElementsByClassName('js--checkbox-voeren');
const checkboxWandelen = document.getElementsByClassName('js--checkbox-wandelen');
const animationContainer = document.getElementById('animationContainer');
const foodAnimation = document.getElementById('foodAnimation');
const walkAnimation = document.getElementById("walkAnimation");
const corgiImage = document.getElementById('corgiImage');

for (let i = 0; i < checkbox.length; i++) {
  const stukjeFill = balk.offsetWidth / checkbox.length;
  checkbox[i].addEventListener('click', function(event){
    checkbox[i].disabled = true;
    fill.style.width = fill.offsetWidth + stukjeFill + "px";
    fill.style.background = "green";
  });
}

for (let i = 0; i < checkboxVoeren.length; i++) {
  checkboxVoeren[i].addEventListener('click', function(event){
    foodAnimation.style.display = "block";
    corgiImage.style.display = "none";
    setTimeout(function(){
      foodAnimation.style.display = "none";
      corgiImage.style.display = "block";
    }, 5000);
  });
}

for (let i = 0; i < checkboxWandelen.length; i++) {
  checkboxWandelen[i].addEventListener('click', function(event){
    walkAnimation.style.display = "block";
    corgiImage.style.display = "none";
    setTimeout(function(){
      walkAnimation.style.display = "none";
      corgiImage.style.display = "block";
    }, 5000);
  });
}
