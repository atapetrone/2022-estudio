function duplicateCount(text) {
    let enMin = text.toLowerCase();
    let arreglo = enMin.split('');
    let posicionArreglo = 0;
    let repetidas = [];
    let resultado = 0;

    for (let letra of arreglo) {
        let posicionUltimaLetra = text.lastIndexOf(letra);

        if (posicionArreglo != posicionUltimaLetra) {
            if (!repetidas.includes(letra)) {
                repetidas.push(letra);
            }

            resultado = repetidas.length;
        }
        posicionArreglo++;
    }

    return resultado;
}

console.log(duplicateCount('insIsti333ndo'));
