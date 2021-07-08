<?php

require '../../connection.php';
session_start();
$id = $_POST['id'];
$nama = $_POST['name'];
$owner = $_POST['owner'];

$name_owner = '';
for($i = 0 ;$i<count($owner);$i++){
    $name_owner .= $owner[$i].',';
}

$name_owner = substr($name_owner,0,-1);

$sql= "UPDATE category set name='$nama', owner='$name_owner' where id = $id";
$query = mysqli_query($conn, $sql);

 if($query) {
   $response['status']  =  200;
   $response['message'] = 'Data telah diproses!';

} else {

   $response['status']  =  500;
   $response['message'] = 'Data gagal diproses!';
   $response['sql'] = $sql;
}

echo json_encode($response);
