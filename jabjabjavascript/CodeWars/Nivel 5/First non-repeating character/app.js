

function firstNonRepeatingLetter(s) {
    console.log(arguments);
	let arregloTemporal = [];
	let letraChispada = '';
    let sMin = s.toLowerCase();

	for (let elemento of sMin) {
		// console.log(elemento);
		let ultimaAparicion = sMin.lastIndexOf(elemento);
		let primeraAparicion = sMin.indexOf(elemento);

		if (ultimaAparicion == primeraAparicion) {
			arregloTemporal.push(s[primeraAparicion]);
		}
	}
	if (arregloTemporal.length != 0) {
		letraChispada = arregloTemporal[0];
	}
	return letraChispada;
}

console.log(firstNonRepeatingLetter('sTreSS'));
