console.log("Hola mundo");

function dimeVaquero(numeron){

  numeron = numeron%2;
  let par = false;
if (numeron==0){
par=true;
}

  return par;
};

let resultado =dimeVaquero(22);

if(resultado== false){
  console.log("el numero es impar")
}else {
  console.log("el numero es par")
};


console.log("_______________________________________________ ");

console.log("La forma del maestro... escribio una tecnica mas simple de if:");

let resultado02=false;
function parOimpar(numerichi){

resultado02 = numerichi%2==0?"par":"impar";

return resultado02;
};

console.log(parOimpar(23));

