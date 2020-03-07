<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

$json = file_get_contents('php://input');
$data = json_decode($json);

$to = 'nick3_4@hotmail.com';
$name = $data->name;
$email = $data->email;
$message = $data->message;
$headers = 'From: webmaster@nickheal.com' . "\r\n" .
    'Reply-To: nick3_4@hotmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (strlen($message) > 0) {
    mail($to, $name, "${email} \r\n {$message}", $headers);
}

?>