<?php
require "../../includes/app.php";
estaAutenticado();

use Feneme\Propiedad;
use Feneme\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


incluirTemplate('header');

//consulta para obtener todos los vendedores
$vendedores = Vendedor::all();

//array para error de validacion que se va llenando
$errores = Propiedad::getErrores();
//crear clase para poner los values de los input en ''
$propiedad = new Propiedad();


//si la pagina emite un post entra en el if y ejecuta el insert
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	/* CREA UNA NUEVA INSTANCIA DE LA CLASE */
	$propiedad = new Propiedad($_POST['propiedad']);

	/* SUBIDA DE ARCHIVOS */

	//crear nombre de imagen unico
	$nombreImagenes = md5( uniqid( rand(), true )). ".jpg";

	//setear la imagen
	if($_FILES['propiedad']['tmp_name']['imagen']){
		//realizar un rezise a la imagen con libreria intervie
		$image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
		$propiedad->setImagen($nombreImagenes);//paso el nombre a la clase para que lo guarde
	}

	
	//validar
	$errores = $propiedad->validar();
	
	//si array esta vacio no hay errores, por lo tanto, inserto
	if(empty($errores)){
		//crear carpeta para imagenes
		$carpetaImagenes = '../../images/';
		
		if(!is_dir($carpetaImagenes)){
			mkdir($carpetaImagenes);
		}

		//guardar imagen en el servidor, se pasa la ruta con el nombre
		$image->save($carpetaImagenes . $nombreImagenes);
		
		//guardar en la db
		
		$resultado = $propiedad->crear();

		if($resultado){
			header("Location: ${raiz_url}admin?m=1");
		}
	}
}



?>

    <main class="container contacto">
        <h1>Crear</h1>
		<a class="boton boton-verde" href="<?php echo RAIZ_URL; ?>admin/">Volver</a>
		
		<?php foreach($errores as $error){ ?>
			<div class="alert-error">
				<?php echo "$error"; ?>
			</div>
		<?php } ?>
		
		<form class="form__contacto" action="" method="POST" enctype="multipart/form-data">

			<?php include "../../includes/templates/form_propiedades.php"; ?>
			<div class="submit-contenedor">
				<input type="submit" value="Cargar vendedor" class="submit boton boton--secundario">
			</div>
		</form>
    </main>

<?php incluirTemplate("footer"); ?>