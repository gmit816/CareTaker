<?php
// Authorisation details.
$username = "gmit816@gmail.com";
$hash = "88444a3aa7f259626a3f65776d88343bbf8c2f2d";

// Config variables. Consult http://api.textlocal.in/docs for more info.
$test = "0";

// Data for text message. This is the text message data.
$sender = "TXTLCL"; // This is who the message appears to be from.
$numbers = "9409056375"; // A single number or a comma-seperated list of numbers
$message = "This is a test message from the PHP API script.";
// 612 chars or less
// A single number or a comma-seperated list of numbers
$message = urlencode($message);
$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
$ch = curl_init('http://api.textlocal.in/send/?');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); // This is the result from the API
curl_close($ch);
?>