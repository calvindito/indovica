<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
define('CLIENT_ID', 'PAYPAAcVT31ZTNff1-yf9v50zD1PvewGkhpwrI5vm_n4yAr528swMHWE7iShPcy4Tsb6u--7wNcD9iFHU1XLyL_CLIENT_ID_HERE');
define('CLIENT_SECRET', 'EASW99yoS3pcVYqvGoMjfZeKEW7iBGo5WknHRmPRbdVAMB3I-4YRJP-I32aJSoalMbCY2Yp63Fruj-wa');
 
define('PAYPAL_RETURN_URL', 'http://localhost/indovica/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/indovica/cancel.php');
define('PAYPAL_CURRENCY', 'USD');
 
// Connect with the database
$db = new mysqli('localhost', 'root', '', 'indovica'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true);