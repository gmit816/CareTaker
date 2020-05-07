<?php
// Account details
/*$apiKey = urlencode('3T36Qb9k91c-otOweSIbKTUuvDhGvKlAFqZXBTlSgx');

// Message details
$numbers = array(919409056375, 918866029901);
$sender = urlencode('CareTaker');
$message = rawurlencode('You have got a new order. Please visit your CareTaker account for more information.');

$numbers = implode(',', $numbers);

// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Process your response here
echo $response;*/

require('../Textlocal.class.php');

$Textlocal = new Textlocal(false, false, '3T36Qb9k91c-otOweSIbKTUuvDhGvKlAFqZXBTlSgx');

$numbers = array(919409056375);
$sender = 'TXTLCL';
$message = 'You have got a new order. Please visit your CareTaker account for more information.';

$response = $Textlocal->sendSms($numbers, $message, $sender);
print_r($response);

?>