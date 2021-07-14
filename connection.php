<?php

require 'vendor/autoload.php';
$environment = 'local';

if($environment == 'development') {
    $url  = 'https://indovica.id/';
    $conn = mysqli_connect('localhost', 'indovica_projectlukisan', 'indovica_projectlukisan', 'indovica_projectlukisan');
} else if($environment == 'local') {
    $url = 'http://localhost/indovica/';
    $conn = mysqli_connect('localhost', 'root', '', 'indovica');
}

$base_url   = $url;
$admin_url  = $url."admin";
$vendor_url = $url."vendor";
?>