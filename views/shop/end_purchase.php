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
			getCartNoEditable("draw_cart", "resume");
			if (code) {
				checkCoupon(code);
			}
		})
	</script>
	<div class="col-12" style='margin-top: 8rem;margin-bottom: 8rem;'>
		<form id="form" class="mt-3 row">
			<div class="col-12 col-md-6">
				<div class="row">
					<div class="col-12">
						<p class="mt-4 mb-3"><strong>Dirección principal</strong></p>
						<p class="mb-4"><small id="list_addresses">No tienes una dirección en tu lista.</small></p>

					</div>
					<div class="col-12">
						<h3>Datos de envío</h3>
						<input id="id" name="id" hidden value="" />
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
								<input class='btn b-tags col-12 mt-3' type="submit" value="Realizar el pedido" />
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
	const id = document.getElementById("id");
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
<script>
	$(document).ready(() => {
		getAddresses();
	});

	const getAddresses = () => {
		$.ajax({
			type: "post",
			url: hostname + "/bridge/routes.php?action=GetAddressesUser",
			data: {},
			success: function(data) {
				let resp = JSON.parse(data);
				let html = "";

				resp.forEach((address, index) => {
					console.log(address);
					html += `
                                <div class="form-check">
                                    <input class="form-check-input" onchange="selectAddress(${address.id},'${address.name_address}','${address.name}','${address.second_name}','${address.address}','${address.state_id}','${address.townhall}','${address.zipcode}')" type="radio" name="flexRadioDefault" id="flexRadioDefault${index}"}>
                                    <label class="form-check-label" for="flexRadioDefault${index}">
                                    <strong>${address.name_address}</strong> ${address.name} ${address.second_name} <strong>Dirección:</strong>${address.address} Estado: ${address.state_id} Colonia: ${address.townhall} CP : ${address.zipcode}
                                    </label>

                                </div>
                            `;
				});
				$("#list_addresses").html(html);
			},
			error: (error) => {
				errorHandleAddress(error);
			},
		});
	}
	const selectAddress = (id_address, _name_address, _name, _second_name, _address, _state_id, _townhall, _zipcode) => {
		debugger
		id.value = id_address
		name.value = _name
		secondNames.value = _second_name
		phoneNumber.value = ""
		email.value = ""
		address.value = _address
		postalCode.value = _zipcode
		colonia.value = _townhall
		city.value = ""
		state.value = _state_id
		country.value = ""
	}
</script>