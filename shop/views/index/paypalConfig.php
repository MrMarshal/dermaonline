<?php
if (session_status() !== PHP_SESSION_ACTIVE)
		session_start();
	
define('PaypalInvoiceId', $_SESSION['invoice_id']);	
define('ProPayPal', 0); // Valor cero (0) modo prueba
if(ProPayPal){
	define("PayPalClientId", "*********************");
	define("PayPalSecret", "*********************");
	define("PayPalBaseUrl", "https://api.paypal.com/v1/");
	define("PayPalENV", "production");
} else {
	define("PayPalClientId", "AW_Nadx3_0muIyLLSxswbHJkHczF8btGKblZSSec82kbqCtLNUS64t-xijKiS5-HR6nj-AUPJVIiyVRu");
	define("PayPalSecret", "EN1iSni4muWHkx83utdFKkEdBIc3BSn_S9gP9JOy-LaYe3HgAqzp6HCFQ585gxtUmCEo7HmapltrlBU-");
	define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
	define("PayPalENV", "sandbox");
}
?>