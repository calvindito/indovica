<?php

require '../../connection.php';

$id    = $_GET['id'];
$query = mysqli_query($conn, "SELECT *,category.name as category_name,adminonline.fullname, adminonline.address, adminonline.phone,adminonline.email FROM product join category on category_id = category.id join adminonline on adminonline.id = vendor_id WHERE product.id = $id");
$data  = mysqli_fetch_assoc($query);

echo json_encode($data);