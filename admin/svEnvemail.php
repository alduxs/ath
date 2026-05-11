<?PHP
header('Content-type: text/html; charset=utf-8');
include_once("../includes/checkLogin.inc.php");
include_once('../includes/classnew.inc.php');
include_once('../includes/conexion.inc.php');
include_once('../includes/funciones.inc.php');
//

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/Exception.php';
require 'includes/PHPMailer/PHPMailer.php';
require 'includes/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
//
$link = Conectarse();
//
include("includes/class.upload.php");
//
$objContenido = new General();
//
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"], 'AN');
//
switch ($strOperacion) {
	case 'I':
		//

		$asunto = $_POST["subject"];
		
		$estado = 0;

		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'c2421359.ferozo.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'enviador@amakelalodge.com';                     // SMTP username
		$mail->Password   = '@2svQ5g2vN';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		$mail->From = 'enviador@amakelalodge.com';
		$mail->FromName = utf8_decode('Argentina Top Hunts');
		$mail->addReplyTo('info@argentinatophunts.com', 'Argentina Top Hunts');

		$mail->addAddress($_POST["emaildest"]);

		$mail->isHTML(true);
		$mail->Subject = $asunto;

		ob_flush();

		$id = $_POST["demail"];

		require('mailsend.php');


		$body = $cuerpo;

		$mail->Body = $body; // Mensaje a enviar

		//send the message, check for errors
		if (!$mail->send()) {
			$fecha = date("Ymd H:i:s");
			$estado = 0;
			$arrData = [
				['value' => $_POST["demail"], 'tipo' => 'AN'],
				['value' => $asunto, 'tipo' => 'AN'],
				['value' => $_POST["ndest"], 'tipo' => 'AN'],
				['value' => $_POST["emaildest"], 'tipo' => 'EM'],
				['value' => $fecha, 'tipo' => 'AN'],
				['value' => $estado, 'tipo' => 'AN'],
			];

			$query = "INSERT INTO email_envio (ee_ed_id,ee_subject,ee_name_dest,ee_email_dest,ee_fecha,ee_estado) VALUES (?,?,?,?,?,?)";
			$intIdRegistro1 = $objContenido->insertContenido($link, $arrData, $query);
		} else {
			$fecha = date("Ymd H:i:s");
			$estado = 1;
			$arrData = [
				['value' => $_POST["demail"], 'tipo' => 'AN'],
				['value' => $asunto, 'tipo' => 'AN'],
				['value' => $_POST["ndest"], 'tipo' => 'AN'],
				['value' => $_POST["emaildest"], 'tipo' => 'EM'],
				['value' => $fecha, 'tipo' => 'AN'],
				['value' => $estado, 'tipo' => 'AN'],
			];

			$query = "INSERT INTO email_envio (ee_ed_id,ee_subject,ee_name_dest,ee_email_dest,ee_fecha,ee_estado) VALUES (?,?,?,?,?,?)";
			$intIdRegistro1 = $objContenido->insertContenido($link, $arrData, $query);
		}


		//
		break;
}
//
header("Location: lstEnvemail.php?seccion=envioemail");
