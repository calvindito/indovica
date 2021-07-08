<?php
require 'bootstrap.php';
use Carbon\Carbon;

function checkkey($token)
{
    $secret = getenv('SECRET');

    // if(!isset($argv[1]))
    // {
    //     exit('Please provide a key to verify');
    // }
    // $jwt = $argv[1];
    
    // split
    $tokenparts = explode('.', $token);
    $header = base64_decode($tokenparts[0]);
    $payload = base64_decode($tokenparts[1]);
    $signatureProvided  = $tokenparts[2];
    
    date_default_timezone_set("Asia/Jakarta");
    $expiredtime = json_decode($payload)->exp;
    // $parse = Carbon::parse($expiration);
    // $deadline = "2021-04-21 14:05:01";
    $expired = Carbon::parse($expiredtime);
    if(Carbon::now() > $expired)
    {
        $tokenexpired = true;
    }
    else{
        $tokenexpired = false;
    }
    // $tokenexpired = (Carbon::now()->diffInSeconds($expiration,false) < 0);
    
    //build a signature based on header and payload using the secret
    $base64urlheader = base64UrlEncode($header);
    $base64urlpayload = base64UrlEncode($payload);
    $signature = hash_hmac('sha256', $base64urlheader.".".$base64urlpayload, $secret, true);
    $base64urlsignature = base64UrlEncode($signature);
    
    $signaturevalid = ($base64urlsignature === $signatureProvided);

        $statustokenexpired = 0;
        $statustokenvalid = 0;
        if($tokenexpired){
            $statustokenexpired = 1;
        }
        else{
            $statustokenexpired = 0;
        }
        if($signaturevalid){
            $statustokenvalid = 0;
        }
        else{
            $statustokenvalid = 1;
        }
        
        if($statustokenexpired == 1)
        {
            return "Token expired";
        }
        if($statustokenvalid == 1)
        {
            return "Token tidak valid";
        }
        
       

  
}
?>