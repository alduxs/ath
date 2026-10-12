<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function sendContactResponse($statusCode, array $payload)
{
    http_response_code($statusCode);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    sendContactResponse(405, [
        'status' => 'error',
        'message' => 'This endpoint accepts POST requests only.',
    ]);
}

$fields = [
    'nombre' => isset($_POST['nombre']) && is_string($_POST['nombre']) ? trim($_POST['nombre']) : '',
    'country' => isset($_POST['country']) && is_string($_POST['country']) ? trim($_POST['country']) : '',
    'emailm' => isset($_POST['emailm']) && is_string($_POST['emailm']) ? trim($_POST['emailm']) : '',
    'phonenumber' => isset($_POST['phonenumber']) && is_string($_POST['phonenumber']) ? trim($_POST['phonenumber']) : '',
    'mensaje' => isset($_POST['mensaje']) && is_string($_POST['mensaje']) ? trim($_POST['mensaje']) : '',
];
$errors = [];
$invalidUtf8Fields = [];
foreach ($fields as $field => $value) {
    if (preg_match('//u', $value) !== 1) {
        $invalidUtf8Fields[$field] = 'This field contains invalid characters.';
    }
}
if ($invalidUtf8Fields) {
    sendContactResponse(422, [
        'status' => 'error',
        'message' => 'Please correct the highlighted information.',
        'errors' => $invalidUtf8Fields,
    ]);
}

$length = function ($value) {
    return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
};

if ($fields['nombre'] === '' || $length($fields['nombre']) > 100) {
    $errors['nombre'] = $fields['nombre'] === '' ? 'Enter your name.' : 'Name must be no longer than 100 characters.';
}
if ($fields['country'] === '' || $length($fields['country']) > 100) {
    $errors['country'] = $fields['country'] === '' ? 'Enter your country.' : 'Country must be no longer than 100 characters.';
}
if (
    $fields['emailm'] === ''
    || $length($fields['emailm']) > 254
    || filter_var($fields['emailm'], FILTER_VALIDATE_EMAIL) === false
) {
    $errors['emailm'] = 'Enter a valid email address.';
}
if (
    $fields['phonenumber'] === ''
    || strlen($fields['phonenumber']) > 25
    || !preg_match('/^[0-9+().\-\s]{7,25}$/', $fields['phonenumber'])
    || preg_match_all('/\d/', $fields['phonenumber']) < 7
) {
    $errors['phonenumber'] = 'Enter a valid phone number.';
}
if ($fields['mensaje'] === '' || $length($fields['mensaje']) > 5000) {
    $errors['mensaje'] = $fields['mensaje'] === '' ? 'Enter a message.' : 'Message must be no longer than 5000 characters.';
}

if ($errors) {
    sendContactResponse(422, [
        'status' => 'error',
        'message' => 'Please correct the highlighted information.',
        'errors' => $errors,
    ]);
}

/*$smtpHost = getenv('ATH_SMTP_HOST');
$smtpUsername = getenv('ATH_SMTP_USERNAME');
$smtpPassword = getenv('ATH_SMTP_PASSWORD');
$smtpFrom = getenv('ATH_SMTP_FROM') ?: $smtpUsername;
$recipientList = getenv('ATH_CONTACT_RECIPIENTS') ?: 'info@argentinatophunts.com,federico@argentinatophunts.com';
*/
$smtpHost = 'c2421359.ferozo.com';
$smtpUsername = 'enviador@amakelalodge.com';
$smtpPassword = '@2svQ5g2vN';
$smtpFrom = 'enviador@amakelalodge.com';
//$recipientList = 'info@argentinatophunts.com,federico@argentinatophunts.com';
$recipientList = 'agi.iniguez@gmail.com';
$recipients = array_filter(array_map('trim', explode(',', $recipientList)));

          

if (!$smtpHost || !$smtpUsername || !$smtpPassword || !$smtpFrom || !$recipients) {
    error_log('Contact form email is not configured: missing SMTP settings.');
    sendContactResponse(503, [
        'status' => 'error',
        'message' => 'The contact form is temporarily unavailable. Please try again later.',
    ]);
}

foreach ($recipients as $recipient) {
    if (filter_var($recipient, FILTER_VALIDATE_EMAIL) === false) {
        error_log('Contact form email is not configured: invalid recipient address.');
        sendContactResponse(503, [
            'status' => 'error',
            'message' => 'The contact form is temporarily unavailable. Please try again later.',
        ]);
    }
}

require_once __DIR__ . '/includes/PHPMailer/Exception.php';
require_once __DIR__ . '/includes/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/includes/PHPMailer/SMTP.php';

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    //$mail->Port = (int) (getenv('ATH_SMTP_PORT') ?: 587);
    $mail->Timeout = 15;

    //$encryption = strtolower(getenv('ATH_SMTP_ENCRYPTION') ?: 'tls');
    /*
    if ($encryption === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } elseif ($encryption === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    } else {
        throw new \RuntimeException('ATH_SMTP_ENCRYPTION must be tls or ssl.');
    }
        */

    $mail->CharSet = 'UTF-8';
    $mail->setFrom($smtpFrom, 'ATH Website');
    foreach ($recipients as $recipient) {
        $mail->addAddress($recipient);
    }
    $mail->addReplyTo($fields['emailm'], $fields['nombre']);
    $mail->isHTML(true);
    $mail->Subject = 'Contact request from Argentina Top Hunts';

    $html = '<h2>New contact request</h2>'
        . '<p><strong>Name:</strong> ' . htmlspecialchars($fields['nombre'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>'
        . '<p><strong>Country:</strong> ' . htmlspecialchars($fields['country'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>'
        . '<p><strong>Email:</strong> ' . htmlspecialchars($fields['emailm'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>'
        . '<p><strong>Phone:</strong> ' . htmlspecialchars($fields['phonenumber'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>'
        . '<p><strong>Message:</strong><br>' . nl2br(htmlspecialchars($fields['mensaje'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')) . '</p>';

    $mail->Body = $html;
    $mail->AltBody = "New contact request\n"
        . "Name: {$fields['nombre']}\n"
        . "Country: {$fields['country']}\n"
        . "Email: {$fields['emailm']}\n"
        . "Phone: {$fields['phonenumber']}\n"
        . "Message:\n{$fields['mensaje']}";
    $mail->send();

    sendContactResponse(200, [
        'status' => 'success',
        'message' => 'Thank you for contacting us. Your message has been sent.',
    ]);
} catch (Exception $exception) {
    error_log('Contact form email failed: ' . $exception->getMessage());
    sendContactResponse(500, [
        'status' => 'error',
        'message' => 'We could not send your message. Please try again later.',
    ]);
} catch (\RuntimeException $exception) {
    error_log('Contact form email configuration error: ' . $exception->getMessage());
    sendContactResponse(503, [
        'status' => 'error',
        'message' => 'The contact form is temporarily unavailable. Please try again later.',
    ]);
}
