<?php

require '../../connection.php';
session_start();
extract($_POST);

$id                = $_GET['id'];
if(isset($_POST['profit'])){
   $profit = $_POST['profit'];
   $public_price = $_POST['public_price'];
   $query = mysqli_query($conn, "UPDATE product SET status='$status', profit='$profit', public_price='$public_price' WHERE id = $id");
}else{
   $query = mysqli_query($conn, "UPDATE product SET status='$status' WHERE id = $id");
}


if($query) {
    
   $response['status']  =  200;
   $response['message'] = 'Data telah diproses!';
} else {
   $response['status']  =  500;
   $response['message'] = 'Data gagal diproses!';
}

echo json_encode($response);