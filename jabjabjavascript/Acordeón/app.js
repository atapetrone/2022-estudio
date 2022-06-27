let preguntasEls = document.getElementsByClassName("pregunta__main");

function recorrido() {
  for (let item of preguntasEls) {
    let encabezado = item.firstElementChild;
    encabezado.addEventListener("click", function () {
      // console.log(encabezado.nextElementSibling);
      let detallesAcordeon = encabezado.nextElementSibling;
      let elSpan = encabezado.firstElementChild.nextElementSibling;
      if (detallesAcordeon.style.maxHeight){
        detallesAcordeon.style.maxHeight= null;
        elSpan.innerHTML="+";
      }else{detallesAcordeon.style.maxHeight= 1800+"px"
      elSpan.innerHTML="-";
    }
      

    });
  }
}

recorrido();
