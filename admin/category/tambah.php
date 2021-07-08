<?php

require '../../connection.php';
session_start();

$nama = $_POST['name'];
$owner = $_POST['owner'];

$name_owner = '';
for($i = 0 ;$i<count($owner);$i++){
    $name_owner .= $owner[$i].',';
}

$name_owner = substr($name_owner,0,-1);

$sql= "INSERT INTO category VALUES ('', '$nama','$name_owner')";
$query = mysqli_query($conn, $sql);

$id= mysqli_insert_id($conn);
 if($query) {
   $response['status']  =  200;
   $response['message'] = 'Data telah diproses!';
   $response['id'] =$id;
} else {

   $response['status']  =  500;
   $response['message'] = 'Data gagal diproses!';
   $response['sql'] = $sql;
}

echo json_encode($response);
