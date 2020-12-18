<?php


if (empty($_POST["name"])) {
    exit("Falta el nombre");
}

if (empty($_POST["email"])) {
    exit("Falta el correo");
}

if (empty($_POST["message"])) {
    exit("Falta el mensaje");
}

//Llamado a los campos
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];

$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo "Correo inválido. Intenta con otro correo.";
    exit;
}

//Datos para el correo
$para = "mercelopezv08@gmail.com";
$asunto = "Mensaje desde mi sitio web";
$contenido= "Has recibido un mensaje desde el formulario de contacto de tu sitio web. Aquí están los detalles:\nDe: $name \n Email: $email \n Mensaje: $message \n Telefono: $phone"; 
$header = "From: $name <" . $email . ">\r\n";


//Enviando mensaje
//mail($para, $asunto, $contenido, $mensaje);

$resultado = mail($para, $asunto, $contenido,$header);
if ($resultado) {
    
    echo "<script> alert('Gracias por contactarse. Su mensaje fue enviado con éxito.')</script>";
    echo "<script> setTimeout(\"location.href='index.html'\",1000)</script>";
 
    
} else {
    echo "Tu mensaje no se ha enviado. Intenta de nuevo.";
    header('Location:index.html');
}

?>