<?php
require '../../connection.php';

$id_article= $_GET['ID'];

$query = mysqli_query($conn,"DELETE FROM article where id = $id_article");

if($query) {
    $response['status']  =  200;
    $response['message'] = 'Success!';
 } else {
    $response['status']  =  500;
    $response['message'] = 'Failed!';
 }
 
 echo json_encode($response);