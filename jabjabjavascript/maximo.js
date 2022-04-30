/* function comparar(a, b){return a - b} */
// INICIA LA FUNCION Y DECLARAS VARIABLES
function maximo(arregloX) {
  let arreglo02 = [];

  // Esta loop solo crea una copia del arreglo original
  for (let numero of arregloX) {
    arreglo02.push(numero);
  }

  // ACA ARRANCA EL WHILE. TRATARE DE AHORCAR LOS NUMEROS
  while (arreglo02.length > 1) {
    if (arreglo02[0] <= arreglo02[1]) {
      arreglo02.shift();
    } else if (arreglo02[0] > arreglo02[1]) {
      let a = arreglo02[0];
      let b = arreglo02[1];
      arreglo02[1] = a;
      arreglo02[0] = b;
      arreglo02.shift();
    }
  }

  //FINAL DE LA FUNCION

  return arreglo02;
}

console.log(maximo([3, 4, 5, 66, 7, 8, 9]));

console.log("____________________________________________________________");
console.log("COMO LO HIZO EL MAESTRO:");

function minimoT(arregloT) {
  //Variables
  let compara = 0;
  //Solución
  for (let digito of arregloT) {
    if (digito < compara || compara == 0) {
      compara = digito;
    }
  }
  //FINAL DE LA FUNCIÓN
  return compara;
}

console.log(
  minimoT([44, 34, 76, 190, 45, 23, 23, 85, 189, 201, 155, 132, 111])
);
