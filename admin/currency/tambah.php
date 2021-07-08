<?php
require '../../connection.php';

$currency = $_POST['currency'];

$nominal = $_POST['nominal'];
$simbol = $_POST['simbol'];

$sql_cek = mysqli_query($conn,"SELECT * FROM currency where name = '$currency'");
if(mysqli_num_rows($sql_cek) > 0){
    $sql = mysqli_query($conn,"UPDATE currency set nominal = '$nominal' where name='$currency'");
}else{
    $sql = mysqli_query($conn,"INSERT INTO currency values('','$currency','$nominal','$simbol')");
}

if($sql){
    
    echo json_encode(200);
}else{
    echo json_encode(500);
}

