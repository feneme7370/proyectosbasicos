<?php
require "includes/app.php";
incluirTemplate("header");


?>
	<main class="main">
		<section class="contacto container">
			<h2 class="title__contacto">Contacto</h2>
			<picture class="img__contacto">
				<img src="src/img/destacada3.jpg">
			</picture>
			<h3 class="subtitle__contacto">Llene el formulario para contactarnos</h3>
			<form class="form__contacto" action="">
				<fieldset>
					<legend>Informacion personal</legend>
					<label for="nombre">Nombre</label>
					<input type="text" id="nombre" placeholder="Su nombre">
					<label for="email">Email</label>
					<input type="email" id="email" placeholder="Su email">
					<label for="telefono">Telefono</label>
					<input type="number" id="telefono" placeholder="Su telefono">
					<label for="mensaje">Mensaje</label>
					<textarea id="mensaje" placeholder="Su mensaje"></textarea>
				</fieldset>
				<fieldset>
					<legend>Informacion sobre la propiedad</legend>
					<label for="operacion">Compra o vende</label>
					<select id="operacion">
						<option selected disabled value="">Seleccionar opcion</option>
						<option value="compra">Compra</option>
						<option value="venta">Venta</option>
					</select>
					<label for="presupuesto">Presupuesto</label>
					<input type="number" id="presupuesto" placeholder="Su presupuesto o precio">
				</fieldset>
				<fieldset>
					<legend>Informacion sobre contacto</legend>
					<p>Como desea ser contactado</p>
					<div class="forma-contacto">
						<label for="contacto-telefono">Telefono</label>
						<input type="radio" name="forma-contacto" id="contacto-telefono" value="Telefono">
						<label for="contacto-email">Email</label>
						<input type="radio" name="forma-contacto" id="contacto-email" value="Email">
					</div>
					<p>Si eligio telefono, diganos en que momento lo podemos contactar</p>
					<label for="fecha">Fecha</label>
					<input type="date" id="fecha">
					<label for="hora">Hora</label>
					<input type="time">
				</fieldset>
				<a class="boton boton--secundario" href="#">Enviar consulta</a>
			</form>
		</section>
	</main>

<?php incluirTemplate("footer"); ?>