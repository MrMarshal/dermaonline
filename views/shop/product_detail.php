<?php 
	$prod = $admin->products->GetProductDetails(["seo_name" => $product]);
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
												<?php $c = 0;
												foreach ($prod['images'] as $img) { ?>
													<div id="f<?php echo $c; ?>" class="tb <?php echo $c == 0 ? 'tb-active' : ''; ?>"> <img class="thumbnail-img fit-image" src="<?php echo $img['url']; ?>"> </div>
												<?php $c++;
												} ?>
											</div>
											<?php $c = 0;
											foreach ($prod['images'] as $img) { ?>
												<fieldset id="f<?php echo $c; ?>1" class="<?php echo $c == 0 ? 'active' : ''; ?>">
													<div class="product-pic"> <img class="pic0" src="<?php echo $img['url']; ?>"> </div>
												</fieldset>
											<?php $c++;
											} ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 mb-5">
							<h1 class="text-uppercase"><?php echo $prod['name']; ?></h1>
							<p class="price-product mb-5">$<?php echo $prod['price']; ?></p>
							<p class="price-product"><?php echo $prod['short_description']; ?></p>
							<div class="row">
								<div class="col-12 col-md-5 mx-auto b-tags text-center py-2">Cantidad <button class="btn">
										- </button> <input type="number" class="col-3 p-0 text-center" max="<?php echo $prod['existence']; ?>" value="1" style="border-color: white !important; background-color:white" /> <button class="btn">
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
				<div class="tab-pane fade show active" id="description1" role="tabpanel" aria-labelledby="home-tab"><?php echo $prod['description']; ?></div>
				<div class="tab-pane fade" id="ventajas" role="tabpanel" aria-labelledby="profile-tab"><?php echo $prod['advantages']; ?></div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
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
						<button class="middle" onclick="addToCart('id')">
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
						<button class="middle" onclick="addToCart('id')">
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
						<button class="middle" onclick="addToCart('id')">
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
						<button class="middle" onclick="addToCart('id')">
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
						<button class="middle" onclick="addToCart('id')">
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

<?php include "views/partials/footer.php"; ?>