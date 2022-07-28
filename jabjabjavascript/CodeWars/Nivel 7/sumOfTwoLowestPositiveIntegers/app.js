function sumTwoSmallestNumbers(numbers) {
    let mayor = numbers[0];
    let primerMenor = numbers[0];
    let segundoMenor = 0;
    let segundoArray = [];

    numbers.forEach((element) => {
        if (element < primerMenor) {
            primerMenor = element;
        }
    });
    // console.log(primerMenor);
    
    numbers.forEach((element) => {
        if (element != primerMenor) {
            segundoArray.push(element);
            // console.log(element)
        }
    });

    segundoMenor = segundoArray[0];
    segundoArray.forEach((element) => {
        if (element < segundoMenor) {
            segundoMenor = element;
            // console.log(segundoMenor);
        }
    });

    // console.log(segundoArray);

    numbers.forEach((element) => {
        if (element > mayor) {
            mayor = element;
            // console.log(`el segundo Menor es ${segundoMenor}`);
        }
    });
    // console.log(mayor);

    // console.log(segundoMenor);

    return primerMenor + segundoMenor;
}

console.log(sumTwoSmallestNumbers([49, 52, 1, 9, 599]));
