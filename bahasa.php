<?php
session_start();
if(!isset($_POST['kodeb'])){
    $kodec = $_POST['kodec'];  
    $_SESSION['currency']       = $kodec;
}else{
    $kodeb = $_POST['kodeb'];
    $kodec = $_POST['kodec'];
    
    $_SESSION['bahasa']       = $kodeb;
    $_SESSION['currency']       = $kodec;
}


echo json_encode(200);

?>