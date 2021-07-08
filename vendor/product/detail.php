<?php

require '../../connection.php';

$id    = $_GET['id'];
$query = mysqli_query($conn, "SELECT *,category.name as category_name FROM product join category on category_id = category.id WHERE product.id = $id");
$data  = mysqli_fetch_assoc($query);

echo json_encode($data);