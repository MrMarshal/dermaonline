<?php
$cart = $admin->shop->GetCurrentCart();
if ($cart['orders'] && count($cart['orders']) > 0) {
	$subtotal = 0;
	$total = 0;
	$shipcost = 0;
?>
	<script type="text/javascript">
		$(document).ready(function() {

			const valores = window.location.search;
			const urlParams = new URLSearchParams(valores);
			var code = urlParams.get('code');
			getCart("draw_cart", "resume");
			if (code) {
				checkCoupon(code);
			}
		})
	</script>
	<div class='col-12 text-center ' style='margin-top: 8rem;margin-bottom: 8rem;'>
		<h1 class='text-center text-uppercase'>Finalizar compra</h1>
		<div id='cart'>
			<div class='col-12 px-5'>
				<div class='row h-100' style='background-color: #F2F2F0 !important;'>
					<div class='col-12 py-3 px-4'>
						<div id='draw_cart'></div>
						<h1 class='mt-2'>TOTAL</h1>
						<p class='mt-2 mb-1'><strong>SUBTOTAL &nbsp;&nbsp;&nbsp;<span><span id='subtotal'></span></span></strong></p>
						<p class='mt-2 mb-1'><strong>ENVÍO &nbsp;&nbsp;&nbsp;<span><span id='ship'></span></span></strong></p>
						<p class='mt-2 mb-1'><strong>DESCUENTO &nbsp;&nbsp;&nbsp;<span><span id='discount'></span></span></strong></p>
						<p class='mt-4 mb-1'><strong>TOTAL &nbsp;&nbsp;&nbsp;<span><span id='total'></span></span></strong></p>
						<a class='btn b-tags col-12 mt-3' href='finalizar-compra'>Realizar el pedido</a>
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
			<a class='btn btn-2 mx-auto py-3 px-5' href='../tienda/1'>Volver a la tienda</a>
		</div>
	</div>
	</div>
	</div>
<?php } ?>