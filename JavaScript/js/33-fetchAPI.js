//llamar a un fetch json

function obtenerEmpleados(){
    const archivo = 'empleados.json';
    fetch(archivo)
        .then (resultado => {
            return resultado.json();
        })
        .then (datos => {
            console.log(datos);
        })
}
obtenerEmpleados();

//llamar json con async away

async function obtenerEmpleados(){
    const archivo = 'empleados.json';

    const resultado = await fetch(archivo);
    const datos = await resultado.json();
    console.log(datos);
}
obtenerEmpleados();