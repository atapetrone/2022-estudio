let barra = document.querySelector(".bar");
let boton1 = document.querySelector(".boton1");
let boton2 = document.querySelector(".boton2");
let boton3 = document.querySelector(".boton3");

console.log("Hello...");
let contador = 0;
let temporizador = setInterval(() => {
  barra.style.width = contador + "%";

  contador++;
  if (contador === 101) {
    clearInterval(temporizador);
    contador = 0;
  }
}, 30);

function medido(porcentaje) {
  let temporizador2 = setInterval(() => {
    barra.style.width = contador + "%";

    contador++;
    if (contador === porcentaje + 1) {
      clearInterval(temporizador2);
      contador = 0;
    }
  }, 30);
}

boton1.addEventListener("click", function(){
medido(10);
});

boton2.addEventListener("click", function(){
  medido(40);
  });

  boton3.addEventListener("click", function(){
    medido(90);
    });
// medido(30);
