
// aca se selecciona el primer elemento h1 econtrado y la segunda linea modifica el css
let elementoH1 = document.querySelector("h1");
elementoH1.style.color="rgb(120,160,160)";

//aca se crea un elemento p y luego se le mete un valor
let contenido= document.createElement("p");
contenido.innerHTML="Hola Mundo";

//Aca se selecciona body y luego se le dice que meta adentro de body un appendChild el cual sera contenido
document.querySelector("body").appendChild(contenido);


// aca selecciono el primer elemento p encontrado y modifico su css OJO: este elemento se creo tambien con JS
let elementoP = document.querySelector("p");
elementoP.style.fontSize ="80px";
elementoP.style.fontFamily = "fantasy";

//aca selecciono el primer elemento h2 encontrado y modifico su css
let elementoH2 = document.querySelector("h2");
elementoH2.style.fontSize ="large"


