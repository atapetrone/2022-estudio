function expandedForm(num) {
    let arranque = num.toString().length - 1;
    let potencia = num.toString().length - 1;
    let multiplo = 0;
    let division = 0;
    let resultadoParcial = 0;
    let resultadoFinal1 = '';
    let resultadoFinal2 = '';
    for (i = 0; i <= arranque; i++) {
        multiplo = Math.pow(10, potencia);
        division = Math.floor(num / multiplo);
        potencia--;
        resultadoParcial = parseInt(num.toString().charAt(i));
        console.log(resultadoParcial);

        if (resultadoParcial !== 0) {
            resultadoFinal1 = (resultadoParcial * multiplo).toString();
            if (resultadoFinal2 === '') {
                resultadoFinal2 = resultadoFinal1;
            } else {
                resultadoFinal2 = `${resultadoFinal2} + ${resultadoFinal1}`;
            }
        }
    }

    return resultadoFinal2;
}
console.log(expandedForm(70304));
