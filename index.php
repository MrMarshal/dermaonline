<?php
	include "routes.php";
	$view = new Front;
	$view->Header(["title"=>"DERMA ONLINE"])
	->View("front")
	->Footer();
?>