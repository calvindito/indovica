<?php 

require 'connection.php';
require 'test_crewdible.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
   $response  = json_decode(file_get_contents('php://input'));
   $xendit_id = $response->id;
   
   if($response->status == 'PAID') {
      $produk       = [];
      $channel      = $response->payment_channel;
      $payment_date = $response->paid_at;
      $payment      = 'paid';
      $status       = 'processed';


   } else if($response->status == 'PENDING') {
      $channel      = null;
      $payment_date = null;
      $payment      = 'unpaid';
      $status       = 'pending';
   } else if($response->status == 'EXPIRED') {
      $channel      = null;
      $payment_date = null;
      $payment      = 'unpaid';
      $status       = 'canceled';
   }

   mysqli_query($conn, "UPDATE transaction SET channel = '$channel', payment_date = '$payment_date', payment_status = '$payment', delivery_status = '$status' WHERE xendit_id = '$xendit_id'");
}

?>