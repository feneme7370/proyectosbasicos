//querySelector
    //trae solo un valor
const heading = document.querySelector('.header__texto h2')
heading.textContent = 'nuevo contenido';
heading.classList.add('nueva-clase');

//querySelectorAll
    //trae todos los valores
const enlaces = document.querySelectorAll('.navegacion a');
console.log(enlaces);
console.log(enlaces[0]);

    //modificar contenido
enlaces[0].textContent = 'Textaso';
enlaces[0].href = 'http://google.com';
enlaces[0].classList.add('http://google.com');
enlaces[0].classList.remove('navegacion__enlace');

//getElementById

//generar nuevo enlace
const nuevoEnlace = document.createElement('A');
    //agregar href
    nuevoEnlace.href = 'nuevo-enlace.html';
    //agregar texto
    nuevoEnlace.textContent = 'nuevo enlace';
    //agregar clase
    nuevoEnlace.classList.add('nav__nav');

    //agregar al documento, seleciona y luego hace hijo
    const navegacion = document.querySelector('.navegacion');
    navegacion.appendChild(nuevoEnlace);

console.log(nuevoEnlace);


