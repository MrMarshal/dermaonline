<?php
include "routes.php";
$view = new Front; //Para definir una vista
$view->Header(["title" => "DERMA ONLINE"]); //La cabecera
?>

<!-- Pantallas chicas y medianas -->
<div class="d-block d-lg-none">
	<div class="row col-12 mx-0 px-0 mt-5 pt-5">
		<div class="text-center mx-auto my-5 py-5">
			<h2 class="subtitle-dark" style="font-weight: bold;">CONTÁCTANOS</h2>
		</div>
	</div>
</div>

<!-- Pantallas grandes -->
<div class="d-none d-lg-block">
	<div class="row col-12 mx-0 px-0 mt-5">
		<div class="text-center mx-auto my-5 py-5">
			<h2 class="subtitle-dark" style="font-weight: bold;">CONTÁCTANOS</h2>
		</div>
	</div>
</div>

<section>
	<div class="container">
		<div class="row col-12 mx-0 px-0">
			<div class="col-12 col-lg-4 mt-3">
				<h3 style="font-weight: bold;">Información de contacto</h3>
				<div class="p-sm-grey">
					<p>Coapa 11, Col. Toriello Guerra. Tlalpan</p>
					<p>Teléfono: 55 7853 1325</p>
					<p>Correo: contacto@dermaonline.mx</p>
					<p>Servicio las 24 horas del día los 365 días del año.</p>
				</div>
			</div>
			<div class="col-12 col-lg-8 mx-0 px-0">
				<form class="col-12 mx-auto" id="contactForm" name="sentMessage" novalidate="novalidate">
					<div class="row">
						<div class="col-12 col-md-6 mt-3">
							<input type="text" id="name" class="placeholder form-control" placeholder="Nombre" required>
							<small>
								<p id="nameError" style="color: #4661a8" class="m-0"></p>
							</small>
						</div>
						<div class="col-12 col-md-6 mt-3">
							<input type="text" id="email" class="placeholder form-control" placeholder="Correo electrónico" required>
							<small>
								<p id="emailError" style="color: #4661a8" class="m-0"></p>
							</small>
						</div>
						<div class="col-12 mt-3">
							<textarea rows="5" cols="9" id="msj" name="msj" class="placeholder form-control" value=" " placeholder="Mensaje"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<small>
								<p id="errorForm" style="color: #4661a8"></p>
							</small>
						</div>
					</div>
					<div class="row col-12">
						<input type="submit" class="btn btn-transparent-yellow text-btn" id="sendMessageButton" type="submit" value="ENVIAR MENSAJE" />
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<div class="mt-5 pt-5">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.7908361275618!2d-99.16392268509549!3d19.29146008696465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce014757e1e5a7%3A0xc0ff591d4f4a1c74!2sDermaOnline!5e0!3m2!1ses-419!2smx!4v1624405215562!5m2!1ses-419!2smx" class="col-12 mx-0 px-0" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<?php
$view->Footer();// Footer
