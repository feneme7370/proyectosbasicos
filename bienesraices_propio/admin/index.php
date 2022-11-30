<?php
require "../includes/app.php";
estaAutenticado();

//IMPORTAR CLASES
use Feneme\Propiedad;
use Feneme\Vendedor;

//implementar metodo para obtener propiedades
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();



incluirTemplate('header');

//si hay un post de eliminar entra el if
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	//validar que el id sea solo numerico
	$id = $_POST['id'];
	
	$id = filter_var($id, FILTER_VALIDATE_INT);
	
	
	if($id){

		$tipo = $_POST['tipo'];

		if(validarTipoPost($tipo)){
			if($tipo === 'vendedor'){
				$vendedor = Vendedor::find($id);
				$vendedor->eliminar();
			}elseif($tipo === 'propiedad'){
				$propiedad = Propiedad::find($id);
				$propiedad->eliminar();
			}
		}
	}
}

//mostrar alerta de los crud
$alerta = isset($_GET['m']) ? $_GET['m'] : '';
?>

    <main class="container">
        <h1>Administracion</h1>
		<?php 
		$mensaje = mostrarNotificaciones($alerta);

		if($mensaje){ ?>
			<p class="alert-exito"><?php echo sanitizar($mensaje) ;?>
			</p>
		<?php }; ?>
		

		<a class="boton boton--secundario" href="<?php echo RAIZ_URL; ?>admin/propiedades/crear.php">Nueva propiedad</a>
		<a class="boton boton--secundario" href="<?php echo RAIZ_URL; ?>admin/vendedores/crear.php">Nuevo vendedor</a>
		
		<h2>Propiedades</h2>	

		<table class="table propiedades">
			<thead>
				<tr>
					<th>Id</th>
					<th>Titulo</th>
					<th>Imagen</th>
					<th>Precio</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($propiedades as $propiedad){ ?>
				<tr>
					<td><?php echo $propiedad->id ?></td>
					<td><?php echo $propiedad->titulo ?></td>
					<td><img class="imagen-table" src="<?php echo RAIZ_URL; ?>images/<?php echo $propiedad->imagen ?>"></td>
					<td><?php echo $propiedad->precio ?></td>
					<td>
						<form method="POST">
							<input type="hidden" value="<?php echo $propiedad->id ?>" name="id" class="boton boton--error">
							<input type="hidden" value="propiedad" name="tipo" class="boton boton--error">
							<input type="submit" value="Eliminar" class="boton boton--error">
						</form>
						<a href="propiedades/actualizar.php?id=<?php echo $propiedad->id ?>" class="boton boton--exito">Actualizar</a>
					</td>
				</tr>
				<?php } ?>
				<!-- cerrar conexion -->
				<?php //mysqli_close($db); ?>
			</tbody>
		</table>

		<h2>Vendedores</h2>

		<table class="table propiedades">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($vendedores as $vendedor){ ?>
				<tr>
					<td><?php echo $vendedor->id ?></td>
					<td><?php echo $vendedor->apellido . ", " . $vendedor->nombre ?></td>
					<td><?php echo $vendedor->telefono ?></td>
					<td>
						<form method="POST">
							<input type="hidden" value="<?php echo $vendedor->id ?>" name="id" class="boton boton--error">
							<input type="hidden" value="vendedor" name="tipo" class="boton boton--error">
							<input type="submit" value="Eliminar" class="boton boton--error">
						</form>
						<a href="vendedores/actualizar.php?id=<?php echo $vendedor->id ?>" class="boton boton--exito">Actualizar</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
    </main>

<?php incluirTemplate("footer"); ?>