let botonEl = document.querySelector(".botonArrojar");
let imgEl = document.querySelector(".imagenDado");

function repetirDado(num){
  setTimeout(function(num){ 
    let aleatorio = Math.random();
    let piso = Math.floor(aleatorio * 10) + 1;
    let dadoResultante = Math.floor(piso * 0.5 + 1);
    console.log(dadoResultante);

    switch (dadoResultante) {
      case 1:
        imgEl.src = "dice1.png";
        break;
      case 2:
        imgEl.src = "dice2.png";
        break;
      case 3:
        imgEl.src = "dice3.png";
        break;
      case 4:
        imgEl.src = "dice4.png";
        break;
      case 5:
        imgEl.src = "dice5.png";
        break;
      case 6:
        imgEl.src = "dice6.png";
        break;
    }
    imgEl.classList.toggle("change");
}, num);
}


function arrojar() {
  console.log("Arrojaste el Dado");
  var audio = new Audio('diceSound.mp3');
  audio.play();
  let segundos = 500;
  for ( let i =0; i<=7;i++){
    repetirDado(segundos);
    segundos= segundos+500;
 }
}

botonEl.addEventListener("click", arrojar);
