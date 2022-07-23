function div5(number) {
    let suma = 0;

    if (number < 0) {
        return 0;
    } else {
        for (let i = number - 1; i > 0; i--) {
            // console.log(
            //     `el numero divido entre 5 es ${i} el sobrante es :${i % 5}`
            // );
            // console.log(
            //     `el numero divido entre 3 es ${i} el sobrante es :${i % 3}`
            // );

            if (i % 5 == 0 && i % 3 == 0) {
                suma = suma + i;
            } else if (i % 5 == 0 && i % 3 != 0) {
                suma = suma + i;
            } else if (i % 3 == 0 && i % 5 != 0) {
                suma = suma + i;
            }
        }
        return suma;
    }
}

console.log(div5(15));
