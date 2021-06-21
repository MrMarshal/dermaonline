<div id="paypal-button-container"></div>

<?php
if (session_status() !== PHP_SESSION_ACTIVE)
		session_start();
	
define('PaypalInvoiceId', $data['cart']['id']);	
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

<div id="paypal_container"></div>
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo PayPalClientId; ?>&currency=MXN">></script>
<script>
	paypal.Buttons({
	    createOrder: function(data, actions) {
	      // This function sets up the details of the transaction, including the amount and line item details.
	      return actions.order.create({
	        "purchase_units": [
	            {
	              "amount": {
	                "currency_code": "MXN",
	                "value": <?php echo PaypalTotalInvoice; ?>
	              }
	            }
	          ]
	      });
	    },
	    onApprove: function(data, actions) {
	      return actions.order.capture().then(function(details) {
	      	alert('Pago realizado ' + details.payer.name.given_name);
	      	console.log(details);
	      	/*$.ajax({
	      		url:"../bridge/clearCart.php",
	      		type:"post",
	      		success:function(res) {
			        alert('Pago realizado ' + details.payer.name.given_name);
			        console.log(details);
			        //window.location = "payment_done.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?php echo PaypalInvoiceId; ?>";
	      		}
	      	})*/
	      });
	    }
	  }).render('#paypal_container');
</script>