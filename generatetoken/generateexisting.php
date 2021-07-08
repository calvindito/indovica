<?php
require 'bootstrap.php';
require __DIR__ . '/../connection.php';

$parseid = $_POST['id'];
$id = base64_decode($parseid);
$secret = bin2hex(random_bytes(32));
    $header = json_encode([
        'typ' => 'JWT',
        'alg' => 'HS256'
]);
date_default_timezone_set("Asia/Jakarta");
$payload = json_encode([
    'user_id' => $id,
    'exp' => date("Y-m-d H:i:s", strtotime("+30 minute"))
]);

$base64urlheader = base64UrlEncode($header);
$base64urlpayload = base64UrlEncode($payload);
$signature = hash_hmac('sha256', $base64urlheader.".".$base64urlpayload, $secret, true);

$base64UrlSignature = base64UrlEncode($signature);

$jwt = $base64urlheader.".".$base64urlpayload.".".$base64UrlSignature;
$encodekey = base64_encode($jwt);
$stmts = $conn->prepare("INSERT into token values (NULL,?)");
$stmts->bind_param("s", $jwt);
$stmts->execute();
echo  $encodekey;


?>
