<?php
require "../../includes/app.php";
estaAutenticado();

use Feneme\Vendedor;

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header("Location: ${raiz_url}/admin");
}

//consulta para obtener todos los vendedores
$vendedor = Vendedor::find($id);

//array para error de validacion que se va llenando
$errores = Vendedor::getErrores();

//si la pagina emite un post entra en el if y ejecuta el insert
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	
    //asignar los valores nuevos
    $args = $_POST['vendedor'];

    //sincronizar objeto en momemoria con lo que el usuario puso
    $vendedor->sincronizar($args);
    
    //validacion
    $errores = $vendedor->validar();

    if(empty($errores)){
        $resultado = $vendedor->actualizar();
        if($resultado){
			header("Location: ${raiz_url}admin?m=2");
		}
    }
}

incluirTemplate('header');

?>

<main class="container contacto">
        <h1>Actualizar vendedor</h1>
		<a class="boton boton-verde" href="<?php echo RAIZ_URL; ?>admin/">Volver</a>
		
		<?php foreach($errores as $error){ ?>
			<div class="alert-error">
				<?php echo "$error"; ?>
			</div>
		<?php } ?>
		
		<form class="form__contacto" action="" method="POST" enctype="multipart/form-data">

			<?php include "../../includes/templates/form_vendedores.php"; ?>
			<div class="submit-contenedor">
				<input type="submit" value="Guardar cambios" class="submit boton boton--secundario">
			</div>
		</form>
    </main>

<?php incluirTemplate("footer"); ?>