<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['phone']) ||  empty($_POST['email'])  || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "ventas@olkb.com"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Contacto OLK-B:  $name";
$body = "Hemos recibido tu correo electrónico.\n\n"."Acontinuación tus detalles:\n\Nombre: $name\n\nEmail: $email\n\nTeléfono de contácto: $phone\n\nMessage:\n$message";
$header = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	
if(!mail($to, $subject, $body, $header)){
  return http_response_code(500); //Error no se pudo enviar correo
}
// if(!mail($to2, $subject, $body, $header)){
//     return http_response_code(500);
// }

return http_response_code(200);//Envio exitoso de email
?>