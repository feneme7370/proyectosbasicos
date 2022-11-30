<?php 
if(!isset($_SESSION)){
	session_start();
}	
	$auth = isset($_SESSION['login']) ? $_SESSION['login'] : false;
	
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="<?php echo RAIZ_URL ?>build/css/style.css">
    <link rel="stylesheet" href="<?php echo RAIZ_URL ?>build/css/normalize.css">
		<!-- GOOGLE FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
	
</head>
<body class="body ">
	<header class="header <?php echo $imgHeader ? 'home' : ""; ?>">
		<div class="container">
			<div class="barra__header">
				<img class="logo__header" src="<?php echo RAIZ_URL ?>src\img\logo.svg">

				<div class="mobile-menu">
					<img src="<?php echo RAIZ_URL ?>src/img/barras.svg" alt="logo-menu-burger">
				</div>
				<div class="derecha">
					<div class="dark-mode">
						<img src="<?php echo RAIZ_URL ?>src/img/dark-mode.svg" alt="btn dark">
					</div>
					<nav class="nav__header">
						<a href="<?php echo RAIZ_URL ?>index.php">Inicio</a>
						<a href="<?php echo RAIZ_URL ?>anuncios.php">Anuncios</a>
						<a href="<?php echo RAIZ_URL ?>nosotros.php">Nosotros</a>
						<a href="<?php echo RAIZ_URL ?>blog.php">Blog</a>
						<a href="<?php echo RAIZ_URL ?>contacto.php">Contacto</a>
						<a href="<?php echo RAIZ_URL ?>login.php">Login</a>
						<?php if($auth === true){ ?>
							"<a href="<?php echo RAIZ_URL ?>logout.php">Cerrar Sesion</a>";
						<?php } ?>
					</nav>
				</div>
			</div>
			<?php if($imgHeader){ ?>
			<div class="title__header">
				<h1>Venta de Casas y Departamentos  Exclusivos de Lujo</h1>
			</div>
			<?php } ?>
		</div>
	</header>