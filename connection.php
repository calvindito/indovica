<?php
use Xendit\Xendit;
require 'vendor/autoload.php';
$environment = 'local';

$environment = 'development';
Xendit::setApiKey('xnd_production_tlPm9EHAcfl2YYKrdsSnDFQH967fZtfyBj1ItFtklIM4OwQbXtZFtaYOzLn5U');

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