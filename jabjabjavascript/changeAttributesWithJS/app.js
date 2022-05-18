let laLiga = document.querySelector("a");
let elTitulo = document.querySelector("h1");

console.log(laLiga);
console.log(laLiga.getAttribute("class"));
console.log(laLiga.getAttribute("href"));

elTitulo.setAttribute("style", "color:purple");
laLiga.setAttribute("id", "nicho");

laLiga.removeAttribute("href");
