<?php
include "../routes.php";
include '../classes/LoadModels.php';

$admin = new Model;
$cart = $admin->shop->GetCurrentCart();
$view = new Front("shop/views");
$view->Header(["title" => "ATERA"])
	->View("index/cart", ["cart" => $cart])
	->Modal("shop")
	->Footer();
