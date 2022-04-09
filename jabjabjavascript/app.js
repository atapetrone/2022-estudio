function contandoVocales(palabreja) {
  let vocales = "aeiou";
  let contador = 0;

  console.log(`buscar ${vocales} en ${palabreja}`);

  for (var i = 0; i < 5; i++) {
    console.log(vocales[i]);
    if (palabreja.includes(vocales[i])) {
      console.log(`si incluye ${vocales[i]}`);
    contador++;
    }
  
  }

  return contador;
}

let resultado = contandoVocales("tamangandapio");

console.log(`El resultado obtenido es: ${resultado}`);
