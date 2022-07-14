let jadenstyle = new Array();
let arregloInicial;
let numeroDeElementos;
let jadenStyleStr;
let jadenStyleStr2;

function jaden(stringogirl) {
  arregloInicial = stringogirl.split("");
  numeroDeElementos = arregloInicial.length;

  /*  jadenstyle.push(enProceso1); */

  for (var i = 0; i < numeroDeElementos - 1; i++) {
    if (i === 0) {
      console.log(arregloInicial[i].toUpperCase());
      jadenstyle.push(arregloInicial[i].toUpperCase());
    }

    if (arregloInicial[i] === " ") {
      console.log("espacio");
      console.log(arregloInicial[i + 1].toUpperCase());
      jadenstyle.push(arregloInicial[i + 1].toUpperCase());
    } else {
      console.log(arregloInicial[i + 1]);
      jadenstyle.push(arregloInicial[i + 1]);
    }
  }
  /* jadenstyle.pop(); */

  jadenStyleStr = jadenstyle.toString();

  for (let e = 0; e < jadenStyleStr.length; e++) {
    jadenStyleStr2 = jadenStyleStr.replace(",", "");
    jadenStyleStr = jadenStyleStr2;
  }

  return jadenStyleStr2;
}

console.log(jaden("Hola como estas hoy y mañana y pasado y la eternidad?"));

console.log(
  "_______________________________________________________________________________"
);

console.log("Ahora la tecnica del maestro");

let elretorno;
let miArray222;
let miArray333;
let depositoWord;
let segundaParteWord;
let ensambleWord;
let arrayFinal = [];
let palabraFinalJadenTenzin;

function transWord(word) {
  depositoWord = word[0].toUpperCase();
  segundaParteWord = word.slice(1);
  ensambleWord = depositoWord + segundaParteWord.toLowerCase();
  return ensambleWord;
}

function tenzinJaden(cadenaDeCar) {
  miArray222 = cadenaDeCar.split(" ");

  for (let o = 0; o < miArray222.length; o++) {
    miArray333 = transWord(miArray222[o]);

    arrayFinal.push(miArray333);
  }
  palabraFinalJadenTenzin = arrayFinal.join(" ");
  return palabraFinalJadenTenzin;
}

console.log(tenzinJaden("super cali fra gilistico es pialidoso"));
