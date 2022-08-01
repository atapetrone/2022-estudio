function wave(str) {
    let minusc = str.toLowerCase();
    let arregloInicial = minusc.split('');
    let contador = 0;
    let arregloFinal = [];
    let onOff = false;

    // console.log(minusc);
    // console.log (arregloInicial);
    // console.log(minusc.length)
    // console.log(arregloInicial.length)

    for (let i = 0; i < minusc.length; i++) {

        
        let antePedazo = minusc.slice(0, contador);
        let pedacito = minusc.slice(contador, contador + 1).toUpperCase();
        let postPedazo = minusc.slice(contador + 1);
        let ensamblado = `${antePedazo}${pedacito}${postPedazo}`;
        if(pedacito!=" "){
          arregloFinal.push(ensamblado);  
        };
        
        contador++;
    }

    return arregloFinal
    // console.log(contador)
}

console.log(wave('MUNDO DO'));
