
let extension = 0
let controlador = 1;
let primeraletra=0;
let segundaletra =0;
let introrespuesta1;
function LetrasEnMedio(stringoman) {

extension = stringoman.length;

extension%2 ==0? controlador =0 : controlador=1;

let puntoMedio = extension/2;

if (controlador ==0)
{
  console.log("doble letra al centro");
/* console.log(puntoMedio.toFixed(0)); */
primeraletra = puntoMedio.toFixed(0)-1;
introrespuesta1 = stringoman.slice(primeraletra,primeraletra+2);
} else 

{
  console.log("una letra al centro");
  /* console.log(puntoMedio.toFixed(0)); */
  primeraletra = puntoMedio.toFixed(0);
  /* console.log(primeraletra); */
  introrespuesta1=stringoman[primeraletra-1];
};


return introrespuesta1;
};

let respondiendo = LetrasEnMedio("a");

console.log(`las letras del centro: ${respondiendo}`);



