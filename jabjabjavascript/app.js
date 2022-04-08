/* var num=5;
if (num > 0 && num === 4 ){
console.log("hola positivo");
} else if (num >3 && num === 5){
  console.log("se cumple lo segundo");
} */

function cuentaletras(palabreja) {
  /*   console.log(`Se valida ${palabreja}`); */

  let numDeLetras = palabreja.length;
  console.log(numDeLetras);

  let arreglo10 = palabreja.split("");
  console.log(arreglo10);

  let numDeVocales = 0;

  for (let i = 0; i < numDeLetras; i++) {
    /*     console.log(` Este es el ${numDeVocales}`);
    numDeVocales++; */
    let candidata = arreglo10[i];
    /* console.log(candidata); */
    if (candidata == "a") {
      /* console.log("la letra es A"); */
      numDeVocales++;
    } else if (candidata == "e") {
      /* console.log("la letra es E"); */
      numDeVocales++;
    } else if (candidata == "i") {
      /* console.log("la letra es I"); */
      numDeVocales++;
    } else if (candidata == "o") {
      /* console.log("la letra es O"); */
      numDeVocales++;
    } else if (candidata == "u") {
      /* console.log("la letra es U"); */
      numDeVocales++;
    }
  }
  console.log(`el numero de vocales es ${numDeVocales}`);
}

cuentaletras("pocahontas");
