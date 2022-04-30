function XO(stringoman) {
  console.log(stringoman);
  let arregloXO = [];
  arregloXO = stringoman.split("");
  console.log(arregloXO);
  let contaX = 0;
  let contaO = 0;
  let resultado = "";

  for (let letra of arregloXO) {
    if (letra === "x" || letra === "X") {
      contaX++;
    } else if (letra === "o" || letra === "O") {
      contaO++;
    }

    //fin del for
  }

  console.log(contaX);
  console.log(contaO);

  if(contaX==0 && contaO ==0){

    resultado="no escribiste ninguna X ni ninguna O";
return resultado;
  }


  if(contaX == contaO){
resultado="Hay el mismo numero de X y de O";

  } else if( contaX> contaO){
    resultado= "Hay mas X"
  } else if( contaX< contaO){
    resultado= "Hay mas O"
  }

return resultado

  //Fin de la funcion
}

console.log(XO("fghfghfghfghfhg"))
