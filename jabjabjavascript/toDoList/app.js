const casillaEl = document.querySelector(".casilla");
const listaToDosEl = document.querySelector(".listaToDos");
const entradaLiToDoMultiEl = document.querySelectorAll(".entradaLiToDo");

//***********
//inicia funcion
function creaLi(texto) {
  let nuevoDiv = document.createElement("div");
  nuevoDiv.classList.add("casaItem");
  let nuevaLi = document.createElement("li");
  nuevaLi.textContent = texto;
  nuevaLi.classList.add("entradaLiToDo");
  let nuevoBoton = document.createElement("button");
  nuevoBoton.textContent="x";
  nuevoBoton.classList.add("tache");
  nuevoDiv.appendChild(nuevaLi);
  nuevoDiv.appendChild(nuevoBoton);

  return nuevoDiv;
}
//***********

//**********/
//inicia función
function agregarToDo() {
  casillaEl.addEventListener("keydown", function (event) {
    let tecla = event.keyCode;
    if (tecla === 13) {
      let valorCasilla = casillaEl.value;
      // console.log(valorCasilla);
      casillaEl.value = null;

      let liParaInsertar = creaLi(valorCasilla);
      // console.log(liParaInsertar);
      listaToDosEl.insertBefore(liParaInsertar, listaToDosEl.firstElementChild);
      // cerrando corchetes:
    }
  });
}
// corchetes cerrados
agregarToDo();
// funcion finalizada e invocada **************

//iniciando funcion ***********************
function doneLi() {
  listaToDosEl.addEventListener("click", function (event) {
    if (event.target.classList.contains("entradaLiToDo")) {
      event.target.classList.toggle("done");
      event.target.nextElementSibling.classList.toggle("tacheSeleccionado");
    }
    //cerrando corchetes
  });
}
doneLi();
// funcion finalizada e invocada *************************

function borrandoLi() {
  listaToDosEl.addEventListener("click", function (event) {
    if (event.target.classList.contains("tacheSeleccionado")) {
      event.target.parentElement.classList.add("delete");
    }
    //cerrando corchetes
  });
}
borrandoLi();
