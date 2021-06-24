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

		<div class="col-12 pt-4">
			<div class="row">

				<div class="col-12 py-5 px-5">
					<div class="row">
						<div class="col-12 col-md-6 mb-5">
							<div class="container-fluid px-sm-1 py-5 mx-auto">
								<div class="row justify-content-center">
									<div class="d-flex">
										<div class="">
											<div class="d-flex flex-column thumbnails">
												<div id="f1" class="tb tb-active"> <img class="thumbnail-img fit-image" src="https://i.imgur.com/wL1uRBk.jpg"> </div>
												<div id="f2" class="tb"> <img class="thumbnail-img fit-image" src="https://i.imgur.com/3NusNP2.jpg"> </div>
												<div id="f3" class="tb"> <img class="thumbnail-img fit-image" src="https://i.imgur.com/pXUPOVR.jpg"> </div>
												<div id="f4" class="tb"> <img class="thumbnail-img fit-image" src="https://i.imgur.com/xX5Qmsa.jpg"> </div>
											</div>
											<fieldset id="f11" class="active">
												<div class="product-pic"> <img class="pic0" src="https://i.imgur.com/wL1uRBk.jpg"> </div>
											</fieldset>
											<fieldset id="f21" class="">
												<div class="product-pic"> <img class="pic0" src="https://i.imgur.com/3NusNP2.jpg"> </div>
											</fieldset>
											<fieldset id="f31" class="">
												<div class="product-pic"> <img class="pic0" src="https://i.imgur.com/pXUPOVR.jpg"> </div>
											</fieldset>
											<fieldset id="f41" class="">
												<div class="product-pic"> <img class="pic0" src="https://i.imgur.com/xX5Qmsa.jpg"> </div>
											</fieldset>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 mb-5">
							<h1 class="text-uppercase">Crema Ruby</h1>
							<p class="price-product mb-5">$20.00</p>
							<p class="price-product">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.</p>

							<div class="row">
								<div class="col-12 col-md-5 mx-auto b-tags text-center py-2">Cantidad <button class="btn">
										- </button> <input class="col-3 p-0 text-center" value="1" style="border-color: white !important; background-color:white" /> <button class="btn">
										+ </button>
								</div>
								<button class="btn btn-2 col-12 col-md-5 mx-auto">Añadir al carrito</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-11 mx-auto" id="specs">
			<ul class="nav nav-tabs ml-n3 mt-3" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#description1" role="tab" aria-controls="home" aria-selected="true">Descripción de producto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#ventajas" role="tab" aria-controls="profile" aria-selected="false">Ventajas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Especificaciones tecnicas</a>
				</li>
			</ul>
			<div class="tab-content py-4" id="myTabContent">
				<div class="tab-pane fade show active" id="description1" role="tabpanel" aria-labelledby="home-tab">---
				</div>
				<div class="tab-pane fade" id="ventajas" role="tabpanel" aria-labelledby="profile-tab">---</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">---</div>
			</div>

		</div>
		<div class="col-12 col-md-11 mx-auto mt-5">
			<h5>PRODUCTOS MÁS VENDIDOS</h5>
		</div>
		<div class="col-12 col-md-11 mx-auto mt-4">
			<div class="row">
				<div class="col-12 col-md-3 mb-5">
					<div class="container-2">
						<img src="https://via.placeholder.com/450" alt="Avatar" class="image col-12">
						<button class="middle" onclick="alert('Producto añadido al carrito')">
							<div class="text">Agregar al carrito</div>
						</button>
					</div>
					<a href="tienda-1.php">
						<h5 class="name-product mb-0 text-center mt-3"><strong>Crema Ruby</strong></h5>
					</a>
					<p class="price-product mb-0 text-center">$20.00</p>
				</div>
				<div class="col-12 col-md-3 mb-5">
					<div class="container-2">
						<img src="https://via.placeholder.com/450" alt="Avatar" class="image col-12">
						<button class="middle" onclick="alert('Producto añadido al carrito')">
							<div class="text">Agregar al carrito</div>
						</button>
					</div>
					<a href="tienda-1.php">
						<h5 class="name-product mb-0 text-center mt-3"><strong>Crema Ruby</strong></h5>
					</a>
					<p class="price-product mb-0 text-center">$20.00</p>
				</div>
				<div class="col-12 col-md-3 mb-5">
					<div class="container-2">
						<img src="https://via.placeholder.com/450" alt="Avatar" class="image col-12">
						<button class="middle" onclick="alert('Producto añadido al carrito')">
							<div class="text">Agregar al carrito</div>
						</button>
					</div>
					<a href="tienda-1.php">
						<h5 class="name-product mb-0 text-center mt-3"><strong>Crema Ruby</strong></h5>
					</a>
					<p class="price-product mb-0 text-center">$20.00</p>
				</div>
				<div class="col-12 col-md-3 mb-5">
					<div class="container-2">
						<img src="https://via.placeholder.com/450" alt="Avatar" class="image col-12">
						<button class="middle" onclick="alert('Producto añadido al carrito')">
							<div class="text">Agregar al carrito</div>
						</button>
					</div>
					<a href="tienda-1.php">
						<h5 class="name-product mb-0 text-center mt-3"><strong>Crema Ruby</strong></h5>
					</a>
					<p class="price-product mb-0 text-center">$20.00</p>
				</div>
				<div class="col-12 col-md-3 mb-5">
					<div class="container-2">
						<img src="https://via.placeholder.com/450" alt="Avatar" class="image col-12">
						<button class="middle" onclick="alert('Producto añadido al carrito')">
							<div class="text">Agregar al carrito</div>
						</button>
					</div>
					<a href="tienda-1.php">
						<h5 class="name-product mb-0 text-center mt-3"><strong>Crema Ruby</strong></h5>
					</a>
					<p class="price-product mb-0 text-center">$20.00</p>
				</div>
			</div>
		</div>



	</div>
</div>
<?php
$view->Footer();// Footer
