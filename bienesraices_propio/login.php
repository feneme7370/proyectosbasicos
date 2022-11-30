<?php

require "includes/app.php";
incluirTemplate("header");

$errores = [];

$email = '';
$password = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	
	if(!$email){
		$errores[] = "ingrear el email";
	}
	if(!$password){
		$errores[] = "ingrear la contraseña";
	}
	
	if(empty($errores)){
		$query = "SELECT * FROM usuarios WHERE email = '${email}'";
		$resultado = mysqli_query($db, $query);
		
		//si hay columnas es porque encontro el usuario
		if($resultado->num_rows){
			//lo convierto en array
			$usuarios = mysqli_fetch_assoc($resultado);
			//verificacion que deberia ser con hash
			if($password == $usuarios['password']){
				//creo conexion
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['login'] = true;
				
				header("Location: ${raiz_url}admin");
				
			}else{
				$errores[] = "La clave es incorrecta";
			}
		}else{
			$errores[] = "El usuario no existe";
		}
	}
}
;
?>
	<main class="main">
		<section class="contacto login">
			<h2 class="title__contacto">Login</h2>

			<form class="form__contacto" action="" method="POST">
				<fieldset>
					<?php foreach($errores as $error){ ?>
						<div class="alert-error">
							<?php echo "$error"; ?>
						</div>
					<?php } ?>
				</fieldset>
				<fieldset>
					<legend>Email y Password</legend>
					<label for="email">Email</label>
					<input type="email" name="email" id="email" value="<?php echo "$email";?>" placeholder="Su email" >
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="Su password" >
				</fieldset>
				<input type="submit" value="Ingresar" class="submit boton boton--secundario">
			</form>
		</section>
	</main>

<?php incluirTemplate("footer"); ?>