<?php
$cart = $admin->shop->GetCurrentCart();
if ($cart['orders'] && count($cart['orders']) > 0) {
	$subtotal = 0;
	$total = 0;
	$shipcost = 0;
	$preference = $admin->mercadopago->CreatePreference(new Request(['cart_id'=>$cart['id']]));
?>
	<script src="https://sdk.mercadopago.com/js/v2"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			const mp = new MercadoPago('TEST-be126955-354f-4dfa-ba7e-4a95f9a2a6c2', {
			      locale: 'es-MX'
			});
			const valores = window.location.search;
			const urlParams = new URLSearchParams(valores);
			var code = urlParams.get('code');
			getCartNoEditable("draw_cart", "resume");
			if (code) {
				checkCoupon(code);
			}
			mp.checkout({
			    preference: {
			        id: "<?php echo $preference['id']; ?>"
			    },
			    render: {
			          container: '.button-checkout', // Indica el nombre de la clase donde se mostrará el botón de pago
			          label: 'Pagar ahora', // Cambia el texto del botón de pago (opcional)
			    },
			    theme: {
			        elementsColor: '#124561',
			        headerColor: '#B37737'
			    }
			});
		})
	</script>
	<div class="col-12" style='margin-top: 8rem;margin-bottom: 8rem;'>
		<form id="form" class="mt-3 row">
			<div class="col-12 col-md-6">
				<div class="row">
					<div class="col-12">
						<h3>Datos de envío</h3>
					</div>
					<div class="col-12 col-md-6">
						<input type="text" id="name" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Nombre(s)" />
					</div>
					<div class="col-12 col-md-6">
						<input type="text" id="secondNames" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Apellido(s)" />
					</div>
					<div class="col-12">
						<input type="number" id="phoneNumber" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Número teléfonico" />
					</div>
					<div class="col-12">
						<input type="email" id="email" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Correo electrónico" />
					</div>
					<div class="col-12">
						<input type="text" id="address" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Dirección de envío" />
					</div>
					<!--  -->
					<div class="col-12">
						<input type="text" id="postalCode" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Código postal" />
					</div>
					<div class="col-12">
						<input type="text" id="colonia" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Colonia" />
					</div>
					<div class="col-12">
						<input type="text" id="city" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Ciudad" />
					</div>
					<div class="col-12">
						<input type="text" id="state" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="Estado" />
					</div>
					<div class="col-12">
						<input type="text" id="country" style="height: 3rem !important;" required class="form-control mt-2 mb-3" value="" placeholder="País" />
					</div>
				</div>
			</div>

			<div class='col-12 col-md-6 text-center '>
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
								<!--<input class='button-checkout' type="submit" value="Realizar el pago" />-->
								<div class="button-checkout"></div>   
							</div>
						</div>
					</div>
				</div>
			</div>

		</form>
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
<script>
	const form = document.getElementById("form");
	const name = document.getElementById("name");
	const secondNames = document.getElementById("secondNames");
	const phoneNumber = document.getElementById("phoneNumber");
	const email = document.getElementById("email");
	const address = document.getElementById("address");
	const postalCode = document.getElementById("postalCode");
	const colonia = document.getElementById("colonia");
	const city = document.getElementById("city");
	const state = document.getElementById("state");
	const country = document.getElementById("country");

	form.addEventListener("submit", (event) => {
		event.preventDefault();
		registerAddress(
			name.value,
			secondNames.value,
			phoneNumber.value,
			email.value,
			address.value,
			postalCode.value,
			colonia.value,
			city.value,
			state.value,
			country.value,
		);
	})
	const registerAddress = (name,
		secondNames,
		phoneNumber,
		email,
		address,
		postalCode,
		colonia,
		city,
		state,
		country) => {
		$.ajax({
			url: "./bridge/routes.php?action=registerNewAddress",
			type: "POST",
			data: {
				user_id: "",
				address: `${address} ${postalCode} ${colonia} ${city} ${state} ${country}`,
				state_id: state,
				townhall: country,
				zipcode: postalCode
			},
			success: (data) => {
				console.log("datos", data);
			},
			error: (error) => {
				errorHandle(error);

			}
		})
	}
</script>