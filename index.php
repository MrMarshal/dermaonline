<?php
include "routes.php";
$view = new Front; //Para definir una vista
$view->Header(["title" => "DERMA ONLINE"]); //La cabecera
?>
<!--  -->

<div class="col-12 m-0 p-0">
	<div class="container-1" style="background-color: rgb(194, 194, 194)">
		<img src="./assets/images/hero.jpg" alt="" style="width: 100%" />
		<div class="centered-horizontal margin-2">
			<a href="index.php">
				<img src="./assets/img/Logo_blancoxl.png" alt="" class="img img-fluid col-10 col-md-10 mx-auto" />
			</a>
		</div>
		<div class="centered-center col-12 mt-2 m-0 p-0">
			<h1 class="col-lg-7 letter-xxl-white">
				Hacemos grandes cosas desde grandes ideas.
			</h1>
			<div class="mt-3 margin-hero text-left">
				<a href="">
					<button class="btn btn-blue px-4 text-white mt-2 mr-3">
						Tienda
					</button>
				</a>
			</div>
		</div>
	</div>
</div>
<!--  -->
</div>
<?php
$view->Footer();// Footer
