<?php  
	$cart = $admin->shop->GetCurrentCart();
	var_dump($cart);
?>

<div class="col-12 text-center " style="margin-top: 8rem;margin-bottom: 8rem;">
	<h1 class="text-center text-uppercase">Carrito</h1>
	<div id="cart">
		<h1 class="text-center text-uppercase mt-5 col-12 col-md-5 mx-auto mb-5">Tu carrito actualmente
			esta vacío</h1>
		<button class="btn btn-2 mx-auto py-3 px-5" onclick="window.location.href='tienda.php?page=1'">Volver a la tienda</button>
	</div>
</div>