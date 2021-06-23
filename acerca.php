<?php
include "routes.php";
$view = new Front; //Para definir una vista
$view->Header(["title" => "DERMA ONLINE"]); //La cabecera
?>

<!-- Pantallas chicas y medianas -->
<div class="d-block d-lg-none">
	<div class="row col-12 mx-0 px-0 mt-5 pt-5">
		<div class="text-center mx-auto my-5 py-5">
			<h2 class="subtitle-dark" style="font-weight: bold;">ACERCA DE NOSOTROS</h2>
		</div>
	</div>
</div>

<!-- Pantallas grandes -->
<div class="d-none d-lg-block">
	<div class="row col-12 mx-0 px-0 mt-5">
		<div class="text-center mx-auto my-5 py-5">
			<h2 class="subtitle-dark" style="font-weight: bold;">ACERCA DE NOSOTROS</h2>
		</div>
	</div>
</div>


<section>
	<div class="container">
		<div class="row col-12 mx-0 px-0">
			<div class="col-12 col-lg-5">
				<div class="col-12 mx-0 px-0 centered-lg">
					<h3>Nuestra misión</h3>
					<p class="p-grey">Dar a conocer y poner al alcance las marcas
						dermatológicas y dermocosméticas más exclusivas y
						primera calidad utilizadas por los mejores dermatólogos
						y cirujanos plásticos de México. Nuestro objetivo:
						Ayudar al tratamiento de los padecimientos de la piel.
					</p>
				</div>
			</div>
			<div class="col-12 col-lg-7">
				<img src="https://via.placeholder.com/650x300" alt="" class="w-100">
			</div>
		</div>
	</div>
</section>

<div class="my-5 py-5">
	<img src="https://via.placeholder.com/1600x450" alt="" class="w-100">
</div>

<section>
	<div class="container">
		<div class="row col-12 mx-0 px-0">
			<div class="col-12 col-lg-7 order-2 order-lg-1">
				<img src="https://via.placeholder.com/650x300" alt="" class="w-100">
			</div>
			<div class="col-12 col-lg-5 order-1 order-lg-2">
				<div class="col-12 col-lg-11 mx-auto mx-0 px-0 centered-lg">
					<h3>Nuestra visión</h3>
					<p class="p-grey">Convertirnos en una referente en tiendas dermatológicas
						a nivel nacional de forma digital y física, por su calidad
						de productos, atención y conocimiento en los próximos
						años.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row col-12 mx-0 px-0 my-5 py-5">
			<div class="col-12 col-lg-5">
				<div class="col-12 mx-0 px-0 centered-lg">
					<h3>Compra segura</h3>
					<p class="p-grey">Las compras que haces en nuestra web son
						completamente seguras: tus datos personales y
						bancarios quedan protegidos y no son accesibles a
						personas no autorizadas en ningún momento del
						proceso. También puedes elegir las modalidades de
						pago por transferencia o por contrareembolso.
					</p>
				</div>
			</div>
			<div class="col-12 col-lg-7">
				<img src="https://via.placeholder.com/650x300" alt="" class="w-100">
			</div>
		</div>
	</div>
</section>

<?php
$view->Footer();// Footer
