function highAndLow(numbers) {
    let arreglo = numbers.split(' ');
    console.log(arreglo);
    let maximo = arreglo[0];
    let minimo = arreglo[0];

    arreglo.forEach((elemento) => {
        if (maximo < parseInt(elemento)) {
            maximo = elemento;
        }

        if (minimo > parseInt(elemento)) {
            minimo = elemento;
        }
    });

    minimo = minimo.toString();
    maximo= maximo.toString();

    return `${maximo} ${minimo}`
}

console.log(
    highAndLow(
        '1303 3784 2895 2694 3028 792 3313 2604 1945 1882 1475 2643 3504 1885 1629 782 3596 2503 3053 2002 2477'
    )
);
