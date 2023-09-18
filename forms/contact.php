<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Dirección de correo a la que se enviará el mensaje
    $to = "cespinosa@deltec.com.co";

    // Encabezados del correo
    $headers = "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Contenido del correo
    $message_body = "
    <html>
    <body>
        <h2>Detalles del mensaje</h2>
        <p><strong>Nombre:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Asunto:</strong> $subject</p>
        <p><strong>Mensaje:</strong></p>
        <p>$message</p>
    </body>
    </html>
    ";

    // Intenta enviar el correo
    if (mail($to, $subject, $message_body, $headers)) {
        echo "success"; // Envío exitoso
    } else {
        echo "error"; // Error en el envío
    }
} else {
    echo "No se ha enviado ningún formulario.";
}
?>

