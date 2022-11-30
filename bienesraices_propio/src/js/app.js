document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
})

function eventListeners (){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive)
}

function darkMode(){
    const darkBody = document.querySelector('.dark-mode');
    darkBody.addEventListener('click', function(){
        const body = document.querySelector('body');
        body.classList.toggle('darkBody')
    })
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.nav__header');

    navegacion.classList.toggle('mostrar');
    /* Codigo largo
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }*/
}