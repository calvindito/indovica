<?php

require '../../connection.php';
session_start();
extract($_POST);

$id                = $_GET['id'];
$query = mysqli_query($conn, "UPDATE product SET status='$status' WHERE id = $id");

if($query) {
    
   $response['status']  =  200;
   $response['message'] = 'Data telah diproses!';
} else {
   $response['status']  =  500;
   $response['message'] = 'Data gagal diproses!';
}

echo json_encode($response);