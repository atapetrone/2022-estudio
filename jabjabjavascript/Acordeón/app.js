let preguntasEls = document.getElementsByClassName("pregunta__main");

for (let item of preguntasEls) {
  // console.log(item.firstElementChild);
  let cabecera = item.firstElementChild;
  let cuerpo = cabecera.nextElementSibling;
  let elSpan = cabecera.lastElementChild;

  cabecera.addEventListener("click", function () {
    if (cuerpo.style.maxHeight) {
      cuerpo.style.maxHeight = null;
      elSpan.innerHTML = "+";
    } else {
      cuerpo.style.maxHeight = 1800 + "px";
      elSpan.innerHTML = "-";
    }
  });
}
