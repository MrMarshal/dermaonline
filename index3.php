<?php
	include "routes.php";
	$view = new Front("front"); //Para definir una vista
	$view->Header(["title" => "DERMA ONLINE"]); //La cabecera

	var_dump($_GET);

	$view->View("shop/buy");

	$view->Footer();// Footer

?>