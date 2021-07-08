<?php

require '../../connection.php';
session_start();
$id    = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM product WHERE id = $id");

if($query) {
   $response['status']  =  200;
   $response['message'] = 'Success!';
} else {
   $response['status']  =  500;
   $response['message'] = 'Failed!';
}

echo json_encode($response);