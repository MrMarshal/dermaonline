<?php
	include "routes.php";
	$view = new Front("front"); //Para definir una vista
	$view->Header(["title" => "DERMA ONLINE"]); //La cabecera
	$view->Footer();// Footer
?>