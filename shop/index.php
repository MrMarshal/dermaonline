<?php
	include "../routes.php";
	include '../classes/LoadModels.php';

	$admin = new Model;

	$prods = $admin->products->GetProductsList();
	$cats = $admin->products->GetCategoriesList();
	$mans = $admin->products->GetManufacturersList();
	$types = $admin->products->GetTypesList();
	$cars = $admin->products->GetCustomDataList();
	$view = new Front("shop/views");
	$view->Header(["title"=>"ATERA"])
	->View("index",["products"=>$prods,"categories"=>$cats,"manufacturers"=>$mans,"types"=>$types,"data"=>$cars])
	->Modal("shop")
	->Footer();
?>