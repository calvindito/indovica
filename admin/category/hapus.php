<?php

require '../../connection.php';
$id = $_GET['id'];

$sql_cek = mysqli_query($conn,"SELECT * from product where category_id = $id");

if(mysqli_num_rows($sql_cek) > 0){
    $response['status']  =  500;
    $response['message'] = 'Data gagal diproses!';
}else{
    $sql = mysqli_query($conn,"DELETE from category where id = $id ");
    if($sql) {
        $response['status']  =  200;
        $response['message'] = 'Data telah diproses!';
     } else {
        $response['status']  =  500;
        $response['message'] = 'Data gagal diproses!';
     }
     
}

echo json_encode($response);