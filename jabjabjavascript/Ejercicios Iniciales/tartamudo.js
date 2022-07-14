let factor = 0;
let arregloFinal = [];
let arregloFinal2 = [];
let stringFinal;
let capital;

function repite(str) {
  /* console.log (`${str}${factor}`); */

  for (e = 0; e <= factor; e++) {
    if ((e == 0) & (factor == 0)) {
      arregloFinal.push(`${str.toUpperCase()}`);
    } else if ((e == 0) & (factor != 0)) {
      arregloFinal.push(`-${str.toUpperCase()}`);
    } else {
      arregloFinal.push(str.toLowerCase());
    }
  }
  return arregloFinal;
}

function tartamudo(cadenuchaStr) {
  let arreglucho = cadenuchaStr.split("");

  for (i = 0; i < arreglucho.length; i++) {
    /* console.log(arreglucho[i]); */
    factor = i;
    arregloFinal2 = repite(arreglucho[i]);
  }
  return arregloFinal2;
}

stringFinal = tartamudo("holA").join("");

console.log(stringFinal);

console.log(
  "--------------------------------------------------------------------"
);

console.log("Ahora la version del maestro:");
console.log(
  "--------------------------------------------------------------------"
);

function letraLocaaa(letra, veces) {
  let resultaLL = "";

  for (let i = 0; i < veces; i++) {
    i == 0
      ? (resultaLL += letra.toUpperCase())
      : (resultaLL += letra.toLowerCase());
  }
  return resultaLL;
}

function repiteee(cadenaStringo) {
  let arregloInicial = cadenaStringo.split("");
  let resultado = [];
  let resultado2 = "";
  let contador = 1;
  for (let letra of arregloInicial) {
    resultado.push(letraLocaaa(letra, contador));
    contador++;
  }
  resultado2 = resultado.join("-");
  return resultado2;
}

console.log(repiteee("hola"));
