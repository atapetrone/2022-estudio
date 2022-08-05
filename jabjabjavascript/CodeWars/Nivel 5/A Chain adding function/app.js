// function add(n) {
// 	let sumaActual = n;

// 	function add2(m) {
// 		sumaActual += m;
// 		return add2;
// 	}

// 	add2.toString=function(){
// 		return sumaActual;
// 	};

// 	return add2;

// }



//OTRA



// function add(n) {
// 	var fn = function (x) {
// 		return add(n + x);
// 	};

// 	fn.valueOf = function () {
// 		return n;
// 	};

// 	return fn;
// }



//OTRA



function add(n) {
	var next = add.bind((n += this | 0));
	next.valueOf = function () {
		return n;
	};
	return next;
}


//OTRA


// function add(n) {
// 	var fn = function (x) {
// 		return add(n + x);
// 	};
// 	fn.toString = function () {
// 		return n;
// 	};
// 	return fn;
// }



//OTRA



// function add(n) {
// 	function monad(m) {
// 		return add(n + m);
// 	}
// 	monad.valueOf = function valueOf() {
// 		return n;
// 	};
// 	return monad;
// }



//OTRA




// function add(n) {
// 	let f = function (x) {
// 		return add(n + x);
// 	};
// 	f.valueOf = function () {
// 		return n;
// 	};
// 	return n;
// }



//OTRA




// function add(n) {
// 	const func = (x) => add(n + x);
// 	func.valueOf = () => n;

// 	return func;
// }



let resultado =add(1)(2);
console.log(resultado)

//Otro intento que no funciona

// function add(a) {
// 	var currentSum = a;

// 	function addF(b) {
// 		currentSum += b;
// 		return addF;
// 	}

// 	addF.toString = function () {
// 		return currentSum;
// 	};

// 	return addF;
// }

// otra funcion que muestra como recibir mas parentesis (pero no en cascada, solo dos)

// function add(n) {
// 	return function (...m) {
// 		return n + m;
// 	};
// }
