let retache = prompt(
  "separa con una coma los usuarios a quienes les gusta este programa"
);

//Este if es para escapar al null y evitar error
if (retache === null) {
  alert("debes escribir algo");
} else {
  let arregloRetache = retache.split(",");
  let numeroUsuarios = arregloRetache.length;
  console.log(numeroUsuarios);

  function meGusta(arregloMG) {
    //inicia la función declarando variables
    let cuentador = 0;
    let arregloDosPrimeros = [];

    //desarrollo de la solución
    for (let opinologo of arregloMG) {
      cuentador++;
      if (cuentador <= 2) {
        arregloDosPrimeros.push(opinologo);
      }
      //fin del for
    }

    //fin de la función
    return arregloDosPrimeros;
  }

  let cuenta = meGusta(arregloRetache);

  console.log(`a ${cuenta} le gusta esto`);

  console.log(`a ${cuenta} y a otros ${numeroUsuarios - 2} les gusta esto`);

  console.log("_____________________________________________");
  console.log("Metodo del maestro:");
  console.log("_____________________________________________");

  function meGusta2(arregloMG2) {
    console.log(arregloMG2.length);
    switch (arregloMG2.length) {
      case 1:
        if (arregloMG2[0] === "") {
          console.log(`a nadie le gusta esto`);
        } else {
          console.log(`a ${arregloMG2[0]} le gusta esto`);
        }
        break;
      case 2:
        console.log(`a ${arregloMG2[0]} y a ${arregloMG2[1]} les gusta esto`);
        break;
      case 3:
        console.log(`a ${arregloMG2[0]}, a ${arregloMG2[1]} y a ${arregloMG2[2]} les gusta esto`);
        break;
    //final del switch
      }
if(arregloMG2.length>3){
  console.log(`a ${arregloMG2[0]}, a ${arregloMG2[1]} y a otros ${arregloMG2.length-2} usuarios les gusta esto`);
}


    //final de la función
    return arregloMG2;
  }

  console.log(meGusta2(arregloRetache));

  //Hasta aca finaliza el if que escapa al null
}
