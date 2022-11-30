<?php

use Feneme\Propiedad;
use Feneme\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require "../../includes/app.php";

$autenticado = estaAutenticado();

incluirTemplate('header');




$id = $_GET['id'];
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if(!$id){
	header("Location: ${raiz_url}");
};

//obtener los datos de la propiedad
$propiedad = Propiedad::find($id);

//consulta para obtener todos los vendedores
$vendedores = Vendedor::all();

//array para error de validacion que se va llenando
$errores = Propiedad::getErrores();

//si la pagina emite un post entra en el if y ejecuta el insert
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

	//asignar los atributos de la actualizacion
	$args = $_POST['propiedad'];
	
	//evito poner todos porque hago un array de propiedad, y los incluyo en $args arriba
	//$args['titulo'] = $_POST['titulo'] ?? NULL;

	$propiedad->sincronizar($args);


	
	/* SUBIDA DE ARCHIVOS */

	//crear nombre de imagen unico
	$nombreImagenes = md5( uniqid( rand(), true )). ".jpg";
	
	//setear la imagen
	if($_FILES['propiedad']['tmp_name']['imagen']){
		//realizar un rezise a la imagen con libreria intervie
		$image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
		$propiedad->setImagen($nombreImagenes);//paso el nombre a la clase para que lo guarde
	}
	//debuguear($image);
	
	
	//validar
	$errores = $propiedad->validar();
	
	//si array esta vacio no hay errores, por lo tanto, inserto
	if(empty($errores)){
		//crear carpeta para imagenes
		$carpetaImagenes = '../../images/';
		
		if(!is_dir($carpetaImagenes)){
			mkdir($carpetaImagenes);
		}

		if($_FILES['propiedad']['tmp_name']['imagen']){
		//guardar imagen en el servidor, se pasa la ruta con el nombre
		$image->save($carpetaImagenes . $nombreImagenes);
		}
		//guardar en la db
		
		$resultado = $propiedad->actualizar();

		if($resultado){
			header("Location: ${raiz_url}admin?m=2");
		}
	}
}



?>

    <main class="container contacto">
        <h1>Actualizar</h1>
		<a class="boton boton-verde" href="<?php echo RAIZ_URL; ?>admin/">Volver</a>
		
		<?php foreach($errores as $error){ ?>
			<div class="alert-error">
				<?php echo "$error"; ?>
			</div>
		<?php } ?>
		
		<form class="form__contacto" action="" method="POST" enctype="multipart/form-data">
			
			<?php include "../../includes/templates/form_propiedades.php";?>
			<div class="submit-contenedor">
				<input type="submit" value="Actualizar" class="submit boton boton--secundario">
			</div>
		</form>
    </main>

<?php incluirTemplate("footer"); ?>