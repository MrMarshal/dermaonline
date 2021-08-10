<?php

class Shop extends Admin
{

	public $productModel;
	public $couponModel;

	function __construct()
	{
		parent::__construct();
		$this->productModel = new Products;
		$this->couponModel = new Coupons;
	}

	public function GetCurrentCart()
	{
		if (session_status() === PHP_SESSION_NONE) session_start();
		$user_id = isset($_SESSION['user'])?$_SESSION['user']['id']:null;
		if ($user_id!=null){
			$cart = $this->GetCartByUser($user_id);
			$cart_id = $cart?$cart['id']:null;
		}else{
			$cart_id = isset($_SESSION['cart_id']) ? $_SESSION['cart_id'] : null;
		}
		if ($cart_id == null) return null;
		$cart = $this->GetById(self::TABLE_CARTS, $cart_id);
		$s = $this->query->select("*", self::TABLE_ORDERS, "cart_id = " . $cart_id . " AND status != 2");
		$cart['orders'] = array();
		$orders = $this->GetAllRows($s);
		foreach ($orders as $order) {
			$order['product'] = $this->GetById(self::TABLE_PRODUCTS, $order['product_id']);
			$order['product_img'] = $this->GetFirst("SELECT * FROM product_images WHERE product_id=$order[product_id] AND type=1");
			$cart['orders'][] = $order;
		}
		return $cart;
	}

	public function AddProductToCart(Request $request)
	{
		// return "Nada";
		if (session_status() === PHP_SESSION_NONE) session_start();
		$user_id = isset($_SESSION['user'])?$_SESSION['user']['id']:null;
		if ($user_id!=null){
			$cart = $this->GetCartByUser($user_id);
			$cart_id = $cart?$cart['id']:null;
		}else{
			$cart_id = isset($_SESSION['cart_id']) ? $_SESSION['cart_id'] : null;
		}
		if ($cart_id == null) $cart_id = $this->CreateCart($user_id);
		$_SESSION['cart_id'] = $cart_id;
		$product = $this->productModel->View($request);
		$product_price = $this->productModel->GetPrice($request);
		$price = $product_price['normal'];

		$s = $this->query->select("*", self::TABLE_ORDERS, "product_id = " . $request->id . " AND cart_id = " . $cart_id . " AND status = 1");
		$order = $this->GetFirst($s);
		if ($order == null) {
			$q = $request->get("quantity");
			$c = $price * $q;
			$this->Insert(self::TABLE_ORDERS, ["cart_id" => $cart_id, "product_id" => $request->id, "quantity" => $request->get("quantity"), "cost" => $c, "status" => 1]);
		} else {
			$q = $order['quantity'] + $request->get('quantity');
			$c = $q * $price;
			$this->Save(self::TABLE_ORDERS, ["quantity" => $q, "cost" => $c], $order['id']);
		}
		$this->SetCartTotal($cart_id);
		return ["quantity" => $q, "cost" => $c];
	}

	public function GetCartByUser($user_id)
	{
		return $this->GetByCondition(self::TABLE_CARTS,["user_id",$user_id]);
	}

	public function CreateCart($user_id)
	{
		if ($user_id==null) $user_id = 0;
		$id = $this->Insert(self::TABLE_CARTS, ["user_id" => $user_id, "total" => 0, "shipping" => 0, "status" => 1, "created_at" => "CURRENT_TIME()"], "id")['id'];
		return $id;
	}

	public function UpdateOrder(Request $request)
	{
		$order_id = $request->get("order_id");
		$quantity = $request->get("quantity");
		$order = $this->GetById(self::TABLE_ORDERS, $order_id);
		$product = $this->productModel->View(new Request(["id" => $order['product_id']]));
		$c = $quantity * $product['price']['normal'];
		$this->Save(self::TABLE_ORDERS, ["quantity" => $quantity, "cost" => $c], $order['id']);
		$cart_cost = $this->SetCartTotal($order['cart_id']);
		return ["quantity" => $quantity, "cost" => $c, "total" => $cart_cost['total'], "subtotal" => $cart_cost['subtotal']];
		return $product;
	}

	public function DeleteOrder(Request $request)
	{
		$order_id = $request->id;
		$this->Save(self::TABLE_ORDERS, ["status" => 2], $order_id);
		$order = $this->GetById(self::TABLE_ORDERS, $order_id);
		$total = $this->SetCartTotal($order['cart_id']);
		return $total;
	}

	public function SetCartTotal($cart_id)
	{
		$subtotal = 0;
		$s = $this->query->select("*", self::TABLE_ORDERS, "cart_id = " . $cart_id . " AND status != 2");
		$orders = $this->GetAllRows($s);
		foreach ($orders as $order) {
			$subtotal += $order['cost'];
		}
		$cart = $this->GetById(self::TABLE_CARTS, $cart_id);
		$total = $subtotal + $cart['shipping'] - $cart['discount'];
		$this->SaveCartCost($cart_id,$total);
		return ["total" => $total,"subtotal"=>$subtotal];
	}

	public function SaveCartCost($cart_id,$total)
	{
		$this->Save(self::TABLE_CARTS, ["total" => $total], $cart_id);
		return ["total" => $total];
	}

	public function FinishBuying(Request $data)
	{
		$cart = $this->GetById(self::TABLE_CARTS,$data->get("cart_id"));
		$data->put("amount",$cart['total']);
		$co = $this->couponModel->ValidateCoupon($data);
		if ($co['valid']==true){
			$total = $cart['total'];
			$discount = 0;
			if ($co['type']=='percent'){
			  $discount = ($co['discount'] * $total) / 100;	
			}
			if ($co['type']=='amount'){
			  $discount = $co['discount'];
			}
			$total=$total-$discount;
			$this->couponModel->ApplyCouponToCart($cart['id'],$co['id'],$discount);
			return $this->SaveCartCost($cart['id'],$total);
		}
	}
}
