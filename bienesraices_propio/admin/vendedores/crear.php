<?php
require "../../includes/app.php";
estaAutenticado();

use Feneme\Vendedor;


//array para error de validacion que se va llenando
$errores = Vendedor::getErrores();
//crear clase para poner los values de los input en ''
$vendedor = new Vendedor();

//si la pagina emite un post entra en el if y ejecuta el insert
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$vendedor = new Vendedor($_POST['vendedor']);

	//validar campos vacios
	$errores = $vendedor->validar();

    if(empty($errores)){
		$resultado = $vendedor->crear();
		if($resultado){
			header("Location: ${raiz_url}admin?m=1");
		}
	}
}

incluirTemplate('header');

?>

<main class="container contacto">
        <h1>Registrar vendedor</h1>
		<a class="boton boton-verde" href="<?php echo RAIZ_URL; ?>admin/">Volver</a>
		
		<?php foreach($errores as $error){ ?>
			<div class="alert-error">
				<?php echo "$error"; ?>
			</div>
		<?php } ?>
		
		<form class="form__contacto" action="" method="POST" enctype="multipart/form-data">

			<?php include "../../includes/templates/form_vendedores.php"; ?>
			<div class="submit-contenedor">
				<input type="submit" value="Cargar vendedor" class="submit boton boton--secundario">
			</div>
		</form>
    </main>

<?php incluirTemplate("footer"); ?>