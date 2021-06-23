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
		<div class="col-12 col-md-3 py-5 pl-5 pr-4">
			<p><strong class="texts-store">Filtrar por precio</strong></p>
			<input type="number" placeholder="Mínimo" class="form-control" value="" />
			<input type="number" placeholder="Máximo" class="form-control mt-2 mb-4" value="" />
			<p class="mb-3 mt-5"><strong class="texts-store">Categorías</strong></p>
			<p class="mb-2"><a href="" class="link-p">Cremas</a></p>
			<p class="mb-2"><a href="" class="link-p">Hidratación</a></p>
			<p class="mb-2"><a href="" class="link-p">Loción</a></p>
			<p class="mb-2"><a href="" class="link-p">Mascaras </a></p>
			<p class="mb-2"><a href="" class="link-p">Serums</a></p>
			<p class="mb-2"><a href="" class="link-p">Protectores solares</a></p>
			<p class="mb-2"><a href="" class="link-p">Tonicos</a></p>
			<p class="mb-2"><a href="" class="link-p">Organicos</a></p>
			<p class="mb-2"><a href="" class="link-p">Maquillaje</a></p>
			<p class="mb-5"><a href="" class="link-p">Limpiadores</a></p>
			<p class="mb-3 mt-5"><strong class="texts-store">Tags populares</strong></p>
			<div class="row">
				<div class="b-tags px-3 py-1 my-1 mx-1">Cuidado</div>
				<div class="b-tags px-3 py-1 my-1 mx-1">Limpiador</div>
				<div class="b-tags px-3 py-1 my-1 mx-1">Cabello</div>
				<div class="b-tags px-3 py-1 my-1 mx-1">Hidratación</div>
				<div class="b-tags px-3 py-1 my-1 mx-1">Piel</div>
				<div class="b-tags px-3 py-1 my-1 mx-1">Tonicos</div>
			</div>
			<p class="mb-3 mt-5"><strong class="texts-store">Tags populares</strong></p>
			<div class="row mb-2">
				<div class="col-8">
					<img src="./assets/images/products/placeholder.svg" class="img-fluid" />
				</div>
				<div class="col-4 px-0">
					<p class="name-product mb-0 mt-5">Tonicos</p>
					<p class="price-product">$20.00</p>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-8">
					<img src="./assets/images/products/placeholder.svg" class="img-fluid" />
				</div>
				<div class="col-4 px-0">
					<p class="name-product mb-0 mt-5">Tonicos</p>
					<p class="price-product">$20.00</p>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-8">
					<img src="./assets/images/products/placeholder.svg" class="img-fluid" />
				</div>
				<div class="col-4 px-0">
					<p class="name-product mb-0 mt-5">Tonicos</p>
					<p class="price-product">$20.00</p>
				</div>
			</div>




		</div>
		<div class="col-12 col-md-8 pt-4">
			<div class="row">
				<div class="col-12">
					<p class="showing-text">Mostrando 1-6 de 62 resultados</p>
				</div>
				<div class="col-12 pb-4">
					<div class="row">
						<div class="col-12 col-md-6 mb-5">
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
						<div class="col-12 col-md-6 mb-5">
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
						<div class="col-12 col-md-6 mb-5">
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
						<div class="col-12 col-md-6 mb-5">
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
						<div class="col-12 col-md-6 mb-5">
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
						<div class="col-12 col-md-6 mb-5">
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
						<div class="col-12 text-center">
							<p class="links-number">1 2 3 4 5 6 7 8 10 11..</p>
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
