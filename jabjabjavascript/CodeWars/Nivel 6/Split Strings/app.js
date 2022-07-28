function generateHashtag(str) {
    let palabraMinuscula = str.toLowerCase();
    let arregloPorLetra = palabraMinuscula.split('');
    let arregloPorLetra2 = [];
    let arregloPorPalabra1 = palabraMinuscula.split(' ');
    let arregloPorPalabra = [];

    arregloPorLetra.forEach((element) => {
        if (element != ' ') {
            arregloPorLetra2.push(element);
        }
    });

    // console.log(arregloPorLetra2);
    arregloPorPalabra1.forEach((element) => {
        if (element != '') {
            arregloPorPalabra.push(element);
        }
    });

    let resultado = '';
    let arrayFinal = [];
    let cadenaFinal = '';
    // console.log(str);
    // console.log(arregloPorPalabra);
    if (arregloPorLetra2.length < 140 && arregloPorLetra2.length != 0) {
        arregloPorPalabra.forEach((element) => {
            let primeraLetraMayuscula = element[0].toUpperCase();
            let restoPalabra = element.slice(1);
            resultado = `${primeraLetraMayuscula}${restoPalabra}`;
            arrayFinal.push(resultado);
            cadenaFinal = `#${arrayFinal.join('')}`;
        });
    } else {
        return false;
    }
    return cadenaFinal;
}

// console.log(generateHashtag('hola mundo como estas'));
// console.log(generateHashtag('HOLA MUNDO COMO ESTAS TODO EN MAYUSCULAS'));
console.log(generateHashtag("a".repeat(140)));
