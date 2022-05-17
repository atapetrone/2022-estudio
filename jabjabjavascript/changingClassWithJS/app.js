let h1El = document.querySelector("h1");
let buttonEl = document.querySelector("button");
let bodyEl = document.querySelector("body");

h1El.classList.remove("saludo");
h1El.classList.add("on");
h1El.classList.toggle("on");

buttonEl.onclick = function(){
bodyEl.classList.toggle("on");
}
