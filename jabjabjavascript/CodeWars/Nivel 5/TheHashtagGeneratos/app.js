function solution(str = 'vacio') {
    let letras = str.split('');
    let dosLetras = [];
    let largo = letras.length;
    // let resultado=[];
let arregloFinal=[];

if (letras.length%2 !=0){
        letras.push("_")
}




    for (let i = 0; i < largo; i++) {
        if(letras[i]!=" "){
           dosLetras.push(letras[i] + letras[i + 1]); 
           i++
        }
        
    }

    return dosLetras;
}

solution("abcdef");
