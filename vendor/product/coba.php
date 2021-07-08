<?php 
session_start();
$id_vendor = $_SESSION['id'];
require '../../connection.php';

$total_data = mysqli_query($conn, "SELECT id, image, name , category_id, owner, year, price, status FROM product where vendor_id = '$id_vendor'");
echo var_dump($total_data);