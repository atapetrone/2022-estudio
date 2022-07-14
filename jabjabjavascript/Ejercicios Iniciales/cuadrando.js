function cuadrando(num) {
  //INICIO DE LA FUNCIÓN Y DECLARACION DE VARIABLES
  let resultado = 0;
  let stringoMan = "";
  let cadena = [];
  let digiTempo = 0;
  let cadenaResultado = [];
  console.log(num);
  //DESARROLLO DE LA FUNCIÓN
  stringoMan = num.toString();
  console.log(stringoMan);
  cadena = stringoMan.split("");
  console.log(cadena);
  for (let digicar of cadena) {
    digiTempo = parseInt(digicar);
    cadenaResultado.push(digiTempo * digiTempo);
  }
  resultado = cadenaResultado.join("");
  resultado = parseInt(resultado);
  //FIN DE LA FUNCIÓN
  return resultado;
}

console.log(cuadrando(953));
