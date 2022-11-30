
// Declaración de Función
sumar();
function sumar() {
    console.log(10 + 10);
}



// Expresión de la función
    //pregunta de examen, y da error porque la primera etapa solo se registran funciones como seria el caso anterior, este inicia como constante
sumar2();
const sumar2 = function() {
    console.log( 3 + 3);
}


//IIFE
(function(){
    console.log('esto es una funcion');
})();