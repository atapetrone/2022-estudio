function moveZeros(arr) {
    let contador = 0;
    let arregloFinal = [];

    arr.forEach((element) => {
        if (element === 0) {
            contador++;
        } else {
            arregloFinal.push(element);
        }
    });

    for (i = 0; i < contador; i++) {
        arregloFinal.push(0);
    }
    return arregloFinal;
}

let arregloCeros = [1, 2, 0, 3, false, 0, 5, 6, 7, 8];
console.log(moveZeros(arregloCeros));
