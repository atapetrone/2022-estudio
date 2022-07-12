let elAnilloDias = document.querySelector(".dias");
let elAnilloHoras = document.querySelector(".horas");
let elAnilloMinutos = document.querySelector(".minutos");
let elAnilloSegundos = document.querySelector(".segundos");
let elBotonStop = document.querySelector(".elBoton");
let elBotonNuevaFecha = document.querySelector(".nuevaFecha");

// console.log(elAnilloDias);
// console.log(elAnilloHoras);
// console.log(elAnilloMinutos);
// console.log(elAnilloSegundos);

function diferenciaCronos(ahora, fechaObj) {
  // console.log(ahora);
  // console.log(fechaObj)

  let dif = fechaObj - ahora;
  let difSegundos = Math.floor(dif / 1000);
  let difMinutos = Math.floor(difSegundos / 60);
  let difHoras = Math.floor(difMinutos / 60);
  let difDias = Math.floor(difHoras / 24);

  // console.log(`${difDias}, ${difHoras}, ${difMinutos}, ${difSegundos}`)

  let diasFinal = difDias;
  let horasFinal = difHoras - diasFinal * 24;
  let minutosFinal = difMinutos - diasFinal * 24 * 60 - horasFinal * 60;
  let segundosFinal =
    difSegundos -
    diasFinal * 24 * 60 * 60 -
    horasFinal * 60 * 60 -
    minutosFinal * 60;

  // console.log(`${diasFinal}, ${horasFinal}, ${minutosFinal}, ${segundosFinal}`)

  return {
    days: diasFinal,
    hours: horasFinal,
    minutes: minutosFinal,
    seconds: segundosFinal,
  };
}

let onOff = 0;
function apagar() {
  if (onOff == 0) {
    clearInterval(compas);
    onOff = 1;
  } else {
    // alert("refrescando");
    document.location.reload();
    onOff = 0;
  }
}

elBotonStop.addEventListener("click", function () {
  apagar();
});

let tiempoObjetivo = new Date("17-jul-2022 14:13");

elBotonNuevaFecha.addEventListener("click", function(){
  let sign = new Date(prompt("Agrega una fecha"));
  tiempoObjetivo = sign;
})

let compas = setInterval(function () {
  // console.log(diferenciaCronos(tiempoAhora,tiempoObjetivo))
  let tiempoAhora = new Date();
  if (tiempoObjetivo > tiempoAhora) {
    let lecturaInstante = diferenciaCronos(tiempoAhora, tiempoObjetivo);

    if (lecturaInstante.days > 9) {
      elAnilloDias.textContent = lecturaInstante.days;
    } else {
      elAnilloDias.textContent = `0${lecturaInstante.days}`;
    }

    if (lecturaInstante.hours > 9) {
      elAnilloHoras.textContent = lecturaInstante.hours;
    } else {
      elAnilloHoras.textContent = `0${lecturaInstante.hours}`;
    }

    if (lecturaInstante.minutes > 9) {
      elAnilloMinutos.textContent = lecturaInstante.minutes;
    } else {
      elAnilloMinutos.textContent = `0${lecturaInstante.minutes}`;
    }

    if (lecturaInstante.seconds > 9) {
      elAnilloSegundos.textContent = lecturaInstante.seconds;
    } else {
      elAnilloSegundos.textContent = `0${lecturaInstante.seconds}`;
    }
  } else {
    elAnilloDias.textContent = 0;
    elAnilloHoras.textContent = 0;
    elAnilloMinutos.textContent = 0;
    elAnilloSegundos.textContent = 0;
  }
}, 1000);
