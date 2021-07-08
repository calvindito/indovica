<?php
session_start();
$kode = $_POST['kode'];

$_SESSION['bahasa']       = $kode;

echo json_encode(200);

?>