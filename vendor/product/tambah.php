<?php

require '../../connection.php';
session_start();
$id_vendor = $_SESSION['id'];
extract($_POST);
$foto              = $_FILES['foto']['name'];

$foto_name = "";
if(!isset($_POST['year'])){
   $year = "0";
}else if(!isset($_POST['technique'])){
   $technique = "-";

}

for($i = 0 ; $i<count($foto); $i++){
	$foto_name .= $_FILES['foto']['name'][$i].',';
         move_uploaded_file($_FILES['foto']['tmp_name'][$i], '../../global_assets/images/foto_produk/' . $_FILES['foto']['name'][$i]); 
}

$foto_name = substr($foto_name,0,-1);
$sql= "INSERT INTO product VALUES ('', '$name', '$description', '$size', '0', '$price', '$foto_name', '$category', '$owner', '$year', '$material', '$technique', '$currency','$id_vendor',0,0,'')";
$query             = mysqli_query($conn, $sql);
//log
 if($query) {
   $response['status']  =  200;
   $response['message'] = 'Data telah diproses!';
} else {

   $response['status']  =  500;
   $response['message'] = 'Data gagal diproses!';
   $response['sql'] = $sql;
}

echo json_encode($response);
