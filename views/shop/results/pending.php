<?php  
	$respuesta = array(
	    'Payment' => $_GET['payment_id'],
	    'Status' => $_GET['status'],
	    'MerchantOrder' => $_GET['merchant_order_id']  ,
	    'external_reference' =>$_GET['external_reference']      
	); 
	echo json_encode($respuesta);
?>