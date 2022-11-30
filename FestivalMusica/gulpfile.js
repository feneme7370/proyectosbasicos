function tarea( done ){
    console.log('mi primer tarea');
    done();
}
exports.primerTarea = tarea;


const {src, dest, watch} = require("gulp");//importa la libreria de gulp que esta en node_modules, y usamos una de las funciones que es src para identificar un archivo, dest para guardar el archivo
const sass = require("gulp-sass")(require('sass'));
const plumber = require("gulp-plumber");

function css(done){

    src("src/scss/**/*.scss")//identidacar el archivo SASS
    .pipe(plumber())//no detiene ejecucion del watch al haber un error
    .pipe( sass() )//Compilarlo
    .pipe( dest("build/css") )//Almacenarla
    
    done();//callback que avisa donde termina la funcion
}
function dev(done){
    watch("src/scss/**/*.scss", css)

    done();
}
exports.css = css;
exports.dev = dev;