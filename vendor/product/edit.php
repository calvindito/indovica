<?php

require '../../connection.php';
session_start();
extract($_POST);
$foto              = $_FILES['foto']['name'];
$id                = $_GET['id'];

$produk            = mysqli_query($conn, "SELECT * FROM product WHERE id = $id");
$data_produk       = mysqli_fetch_assoc($produk);
$foto_produk       = '';
if($_FILES['foto']['name'][0]!="") {
  for($i = 0 ; $i<count($foto); $i++){
   $foto_produk .= $_FILES['foto']['name'][$i].',';
  }
         
} else {
   $foto_produk = $data_produk['image'];
}

$query = mysqli_query($conn, "UPDATE product SET images='$foto_produk', name='$name', category_id ='$category', owner = '$owner', size='$size',year='$year', material='$material', teknik= '$technique', price='$price', currency='$currency', description = '$description' WHERE id = $id");

if($query) {
   if($_FILES['foto']['name'][0]!="") {
    for($i = 0 ; $i<count($foto); $i++){
      move_uploaded_file($_FILES['foto']['tmp_name'][$i], '../../global_assets/images/foto_produk/' . $_FILES['foto']['name'][$i]); 
    }
   }
    
   $response['status']  =  200;
   $response['message'] = 'Data telah diproses!';
} else {
   $response['status']  =  500;
   $response['message'] = 'Data gagal diproses!';
}

echo json_encode($response);