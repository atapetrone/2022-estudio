let botonEl = document.querySelector("#elBoton");
let bodyEl = document.querySelector("body");
let navEl = document.querySelector("nav");
let hamburgerEl = document.querySelector(".hamburger");
let barra1El = document.querySelector(".barra1");
let barra2El = document.querySelector(".barra2");
let barra3El = document.querySelector(".barra3");
let contenedorEl = document.querySelector(".contenedor");








botonEl.parentNode.style.backgroundColor = "#f0f0f2";
//botonEl.parentNode.style.position="absolute";
//botonEl.parentNode.style.paddingLeft="200px";
botonEl.parentNode.style.width="100%";
botonEl.parentNode.style.textAlign = "center";

botonEl.style.position = "relative";
//botonEl.style.left = "46%";
botonEl.style.fontSize = "1.5rem";
botonEl.style.margin = "1rem";
botonEl.style.padding = "0.5rem";
botonEl.style.background = "rgb(73,73,73)";
botonEl.style.color = "white";
botonEl.style.borderRadius = "5px";
botonEl.style.borderColor = "transparent";

function fondo(){
  bodyEl.classList.toggle("change3");
}

function hoverBoton(){
  botonEl.style.background = "rgb(43,43,43)";
}

function hoverBoton2(){
  botonEl.style.background = "rgb(73,73,73)";
}

function oprimeTache(){
  navEl.classList.toggle("open1");
  barra1El.classList.toggle("change");
  barra2El.classList.toggle("change");
  barra3El.classList.toggle("change");
  contenedorEl.classList.toggle("open2");
  //botonEl.parentNode.classList.toggle("open3");
}

botonEl.addEventListener("click",fondo);
botonEl.addEventListener("mouseover",hoverBoton);
botonEl.addEventListener("mouseleave",hoverBoton2);
hamburgerEl.addEventListener("click", oprimeTache);




