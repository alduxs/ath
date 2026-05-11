<?php
header('Content-type: text/html; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/Exception.php';
require 'includes/PHPMailer/PHPMailer.php';
require 'includes/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = '6LdDwwsTAAAAAGzKRCRB3RF2bd-kuuC7FaS_pq7B';
$secret = '6LdDwwsTAAAAAOZSXgEM1bbMf7s_RGrDNw76TRKo';
$lang = 'es';

include_once('includes/classnew.inc.php');
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
$objContenido = new General();
//
$link = Conectarse();
//

$email = $objContenido->dataCleaner($_POST["emailm"], 'EM');

$arrData = [['value' => $_POST["emailm"], 'tipo' => 'EM']];
$query = "SELECT * FROM bd_email WHERE email_data = ?";
$rsCont = $objContenido->getOneContenido($link, $arrData, $query);
$intQtyRecords = $rsCont->rowCount();

if ($intQtyRecords == 0) {




	$asunto = "Pedido de Info desde la web | Argentina Tops Hunts";

	$mail->isSMTP();                                            // Send using SMTP

	$mail->Host       = 'c2421359.ferozo.com';                    // Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	$mail->Username   = 'enviador@amakelalodge.com';                     // SMTP username
	$mail->Password   = '@2svQ5g2vN';                             // SMTP password

	$mail->From = 'enviador@amakelalodge.com';
	$mail->FromName = utf8_decode('ATH Web');
	$mail->addAddress('info@argentinatophunts.com');     // Add a recipient
	$mail->addAddress('federico@argentinatophunts.com');     // Add a recipient
	//$mail->addAddress('agi.iniguez@gmail.com');
	$mail->addReplyTo($email);

	$mail->isHTML(true);
	$mail->Subject = $asunto;
	$body = "<strong>El siguiente email requiere mas información:</strong> " . $email;

	$mail->Body = $body; // Mensaje a enviar

	//send the message, check for errors
	if (!$mail->send()) {

		echo "noenviado";
	} else {
		$arrData = [
			['value' => $email, 'tipo' => 'EM']
		];

		$query = "INSERT INTO bd_email (email_data) VALUES (?)";
		$intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);
		echo 'enviado';
	}
} else {
	echo "repetido";
}
