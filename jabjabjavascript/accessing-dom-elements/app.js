//Como acceder a un solo elemento

let h1Inicial0 = document.getElementById("logo");
console.log(h1Inicial0);

//Este agarra al primero que encuentra de arriba hacia abajo
let h1Inicial1 = document.querySelector("h1");
console.log(h1Inicial1);

let h1Inicial2 = document.querySelector("#logo");
console.log(h1Inicial2);

console.log(document.querySelector("#logo"));

// como acceder a varios elementos simultaneamente

let liConjunto1 = document.getElementsByClassName("elementoLista");
console.log(liConjunto1);

let liConjunto2 = document.querySelectorAll(".elementoLista");
console.log(liConjunto2);

let liConjunto3 = document.getElementsByTagName("li");
console.log(liConjunto3);

let liConjunto4 = document.querySelectorAll(".marcaje , .elementoLista");
console.log(liConjunto4);