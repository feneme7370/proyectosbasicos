<?php
require "includes/app.php";
incluirTemplate("header");

// include "includes/templates/header.php";
?>
	<main class="main">
		<section class="store container">
			<h2 class="title__store">Casas en venta y Deptos</h2>
			<?php
			$limite = 100;
			include "includes/templates/anuncios.php";
			?>
		</section>
	</main>

<?php incluirTemplate("footer"); ?>