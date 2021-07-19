<?php
session_start();
$kodeb = $_POST['kodeb'];
$kodec = $_POST['kodec'];

$_SESSION['bahasa']       = $kodeb;
$_SESSION['currency']       = $kodec;

echo json_encode(200);

?>