let botonEl = document.querySelector(".boton");
let modalEl = document.querySelector(".modal");
let tacheEl = document.querySelector(".tache");
let contenedorBotonEl = document.querySelector(".contenedorBoton");
let cuadraModalEl = document.querySelector(".cuadraModal");
let signal1=0;
window.addEventListener("click", function(event){
  if(event.target===contenedorBotonEl || event.target === cuadraModalEl){
    modalEl.classList.remove("open5");
  }
})


function cerrar(){
 modalEl.classList.remove("open5") 
}

function abrir(){
  modalEl.classList.add("open5")
}


botonEl.addEventListener("click", abrir);
tacheEl.addEventListener("click", cerrar);


