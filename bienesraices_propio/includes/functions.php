<?php
$direccion = "http://127.0.0.1";
//$direccion = "http://192.168.18.119";
//$direccion = "http://192.168.18.119";

define('TEMPLATE_URL', __DIR__ . "/templates"); 

define('RAIZ_URL', $direccion . "/www.cursophp.com/bienesraices_propio/");
$raiz_url = RAIZ_URL;

define('INDEX_URL', $direccion . "/www.cursophp.com/bienesraices_propio/index.php");
$index_url = INDEX_URL;

define('IMAGES_URL', $direccion . "/www.cursophp.com/bienesraices_propio/images/");
$images_url = IMAGES_URL;

function incluirTemplate($nombre, $imgHeader = false){
	include TEMPLATE_URL."/${nombre}.php";
}

function estaAutenticado(){
	session_start();
	//$autenticado = $_SESSION['login']; 
	
	if(!($_SESSION['login'])){
		header("Location: /www.cursophp.com/bienesraices_propio/index.php");
	}
}

function debuguear($variable){
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
	exit;
}

//escapar/sanitizar el HTML
function sanitizar($html){
	$s = htmlspecialchars($html);
	return $s;
}

//limita opciones de eliminar propiedades o vendedores
function validarTipoPost($tipo){
	$tipos = ['propiedad', 'vendedor'];
	return in_array($tipo, $tipos);
}

//muestra los mensajes del crud
function mostrarNotificaciones($alerta){
	$mensaje = 'asd';

	switch($alerta){
		case "1":
			$mensaje = 'Creado correctamente';
			break;
		case "2":
			$mensaje = 'Actualizado correctamente';
			break;
		case "3":
			$mensaje = 'Eliminado correctamente';
			break;
		default:
			$mensaje = false;
			break;
	}

	return $mensaje;
}