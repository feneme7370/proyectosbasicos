//this hace referencia al objeto de forma dinamica, no para no estar poniendo el nombre de la variable

// This
const reservacion = {
    nombre: 'Juan',
    apellido: 'De la torre',
    total: 5000,
    pagado: false,
    informacion: function() {
        console.log(`El Cliente ${this.nombre} reservó y su cantidad a pagar es de ${this.total}`);
    }
}

const reservacion2 = {
    nombre: 'Pedro',
    apellido: 'De la torre',
    total: 5000,
    pagado: false,
    informacion: function() {
        console.log(`El Cliente ${this.nombre} reservó y su cantidad a pagar es de ${this.total}`);
    }
}

reservacion.informacion();
reservacion2.informacion();

// This pregunta examen
//las arrows function como metodos hacen referencia a window.nombre, y daria undefined, no juan
const reservacion3 = {
    nombre: 'Juan',
    informacion: () => {
        console.log(`El Cliente ${this.nombre} reservó y su cantidad a pagar es de ${this.total}`);
    }
}