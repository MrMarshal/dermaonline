<?php
include "routes.php";
$view = new Front; //Para definir una vista
$view->Header(["title" => "DERMA ONLINE"]); //La cabecera
?>
<div class="col-12">
	<div class="row">
		<div class="col-12 py-5 px-5" style="margin-top: 8rem; background-color:#F2F2F2">
			Home / Productos
		</div>
		<div class="col-12 col-md-8 mx-auto my-5 ">
			<div class="row">
				<div class="col-6 mx-auto col-md-2 p-0 mt-3" style="font-size: 80%;">
					<a href="#" class="link" onclick="localStorage.clear();window.location.href='index.php'">
						<p class="text-uppercase mt-5"><strong style="font-weight: 400;">Hola USUARIO</strong> </p>
					</a>
					<a href="#" class="link" style="background-color: #F2F2F0 !important;" onclick="localStorage.clear();window.location.href='index.php'">
						<p class="text-uppercase mt-2"><strong style="font-weight: 400;">mi cuenta</strong> </p>
					</a>
					<a href="#" class="link" onclick="localStorage.clear();window.location.href='index.php'">
						<p class="text-uppercase mt-2"><strong style="font-weight: 400;">datos personales</strong> </p>
					</a>
					<a href="#" class="link" onclick="localStorage.clear();window.location.href='index.php'">
						<p class="text-uppercase mt-2"><strong style="font-weight: 400;">mis compras</strong> </p>
					</a>
					<a href="#" class="link" onclick="localStorage.clear();window.location.href='index.php'">
						<p class="text-uppercase mt-2"><strong style="font-weight: 400;">cerrar sesión</strong> </p>
					</a>
				</div>
				<div class="col-12 col-md-10 mx-auto mt-3">
					<div class="row">
						<div class="col-md-6">
							<h1>Mi cuenta</h1>
							<hr class="my-0">
							<p class="mt-4 mb-3"><strong>Dirección principal</strong></p>
							<p class="mb-4"><small>No tienes una dirección en tu lista.</small></p>
							<button class="btn b-tags px-5">Crear dirección</button>
							<hr class="">
							<div class="row px-3">
								<p class="mr-auto"><strong>MIS PEDIDOS</strong> </p>
								<p class="ml-auto"><u><small>Ver todos</small></u></p>
							</div>
							<p class="mb-4"><small>No tienes pedidos registrados.</small></p>

						</div>
						<div class="col-md-6">
							<h1 class="d-none d-md-block">&nbsp;</h1>
							<hr class="mt-0 mb-4">
							<p class="mr-auto"><strong>¿NECESITAS AYUDA?</strong> </p>
							<p class="mb-4"><small>Manda un mail a atencion@dermaonline.com o <br />
									Llama al 800-737-4072<br />
									Lunes a Viernes - 9:00 a 18:00 <br />
									Sábado y Domingo - 9:00 a 15:00.</small></p>
							<hr class="">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php
$view->Footer();// Footer
