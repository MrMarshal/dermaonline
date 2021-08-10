<?php
class Mercadopago extends Admin
{
	function __construct()
	{
		require __DIR__ . '/../../scripts/vendor/autoload.php';
		MercadoPago\SDK::setAccessToken("TEST-121362688055211-072718-c37d100491c15a8a50c5c9b35b983d86-242758570");
		parent::__construct();
	}

	public function CreatePreference(Request $data)
	{
		$shop = new Shop();
		$cart = $shop->GetCurrentCart();
		$cart_id = $data->get("cart_id");

		$preference = new MercadoPago\Preference();
		var_dump($cart);
		if (sizeof($cart['orders']) > 1) {
			$item = new MercadoPago\Item();
			$item->id = $cart['id'];
			$item->title = "Productos Dermaonline";
			$item->quantity = 1;
			$item->unit_price = $cart['total'];
			$item->currency_id = "MXN";
			$item->description = "Compra del carrito con ID " . $cart['id'];
			$da = array($item);
		} else {
			$da = array();
			foreach ($cart['orders'] as $ord) {
				$it = (object) $ord;
				$item = new MercadoPago\Item();
				$item->id = $it->product['id'];
				$item->title = $it->product['name'];
				$item->quantity = $it->quantity;
				$item->unit_price = $cart['total'] / $it->quantity;
				$item->currency_id = "MXN";
				$item->picture_url = $it->product_img['url'];
				$item->description = $it->product['short_description'];
				array_push($da, $item);
			}
		}


		$preference->items = $da;
		$preference->auto_return = "approved";
		$preference->back_urls = array(
			"success" => __ROOT__ . "/result/success",
			"failure" => __ROOT__ . "/result/failure",
			"pending" => __ROOT__ . "/result/pending"
		);


		$preference->discount = 100;
		$preference->discountLabel = "$100 de descuento";
		$preference->statement_descriptor = "DERMAONLINEMX";
		$preference->external_reference = $cart_id;
		$preference->binary_mode = true;
		$preference->save();
		$response = array(
			'id' => $preference->id,
		);
		return $response;
	}
}
