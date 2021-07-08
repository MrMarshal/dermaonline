<?php
	$cart = $admin->shop->GetCurrentCart();
	if (count($cart['orders']) > 0) {
		$subtotal = 0;
		$total = 0;
		$shipcost = 0; 
?>
	<script type="text/javascript">
		$(document).ready(function() {
			getCart();
		})
	</script>
<div class='col-12 text-center ' style='margin-top: 8rem;margin-bottom: 8rem;'>
	<h1 class='text-center text-uppercase'>Carrito</h1>
		<div id='cart'>
			<div class='row text-left pt-5'>
				<div class='col-12 col-md-8'>
					<div class='row '>
						<div class='col-6 col-sm-2 d-none d-md-block'>
							&nbsp;
						</div>
						<div class='col-6 col-sm-2 d-none d-md-block'>
							&nbsp;
						</div>
						<div class='col-6 col-sm-2 d-none d-md-block text-center'>
							<strong>
								PRODUCTO
							</strong>
						</div>
						<div class='col-6 col-sm-2 d-none d-md-block text-center'>
							<strong>
								PRECIO
							</strong>
						</div>
						<div class='col-6 col-sm-2 d-none d-md-block text-center'>
							<strong>
								CANTIDAD
							</strong>
						</div>
						<div class='col-6 col-sm-2 d-none d-md-block text-center'>
							<strong>
								SUBTOTAL
							</strong>
						</div>
					</div>
					<div id='draw_cart'></div><div class='row col-12 col-md-9 mx-auto p-0 mt-3'>
					<div class='col-12'>
						<input class='b-tags p-2 text-center' type='text' placeholder='CÓDIGO DE CUPÓN' />
						<button class='btn btn-bor-bottom mx-3 px-0'>Aplicar cupón</button>
						<button class='btn btn-bor-bottom mx-3 px-0' onclick='window.location.reload()'>Actualizar carrito</button>
					</div>
				</div>
			</div>
			<div class='col-12 col-md-4 px-5'>
				<div class='row h-100' style='background-color: #F2F2F0 !important;'>
					<div class='col-12 py-3 px-4'>
						<h1 class='mt-2'>TOTAL</h1>
						<p class='mt-2 mb-1'><strong>SUBTOTAL &nbsp;&nbsp;&nbsp;<span>$<span id='subtotal'></span></span></strong></p>
						<p class='mt-2 mb-1'><strong>ENVÍO &nbsp;&nbsp;&nbsp;<span>$<span id='ship'></span></span></strong></p>
						<p class='mt-4 mb-1'><strong>TOTAL &nbsp;&nbsp;&nbsp;<span>$<span id='total'></span></span></strong></p>
						<a class='btn b-tags col-12 mt-3' href='tienda/1'>Volver a la tienda</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } else { ?>
	<div class='col-12 text-center ' style='margin-top: 8rem;margin-bottom: 8rem;'>
			<div id='cart'>
				<h1 class='text-center text-uppercase mt-5 col-12 col-md-5 mx-auto mb-5'>Tu carrito actualmente esta vacío</h1>
					<a class='btn btn-2 mx-auto py-3 px-5' href='tienda/1'>Volver a la tienda</a>
				</div>
			</div>
	</div>
</div>
<?php } ?>