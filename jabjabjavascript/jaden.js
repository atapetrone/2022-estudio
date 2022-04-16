let jadenstyle=new Array();
let arregloInicial;
let numeroDeElementos;
let jadenStyleStr;
let jadenStyleStr2;

function jaden(stringogirl) {
  arregloInicial = stringogirl.split("");
  numeroDeElementos = arregloInicial.length;
 
 /*  jadenstyle.push(enProceso1); */

for (var i =0; i<numeroDeElementos-1;i++){

if (i===0){
  console.log(arregloInicial[i].toUpperCase());
  jadenstyle.push(arregloInicial[i].toUpperCase());
}

if(arregloInicial[i]===" "){
   console.log ("espacio");
   console.log(arregloInicial[i+1].toUpperCase());
   jadenstyle.push(arregloInicial[i+1].toUpperCase());
}else {
  console.log(arregloInicial[i+1])
  jadenstyle.push(arregloInicial[i+1]);
};



};
/* jadenstyle.pop(); */

jadenStyleStr = jadenstyle.toString();




for (let e=0; e<jadenStyleStr.length;e++){

jadenStyleStr2 =jadenStyleStr.replace(",","");
jadenStyleStr =jadenStyleStr2;
};



return jadenStyleStr2;
}

console.log(jaden("Hola como estas hoy?"))
 /* for (i=0;i>numeroDeElementos;i++)
   {
console.log(arregloInicial);
   }; */