<?php

require __DIR__ . '/../connection.php';
include 'validatejwt.php';

$token = $_POST['token'];
$decode = base64_decode($token);
$result = mysqli_query($conn, "SELECT * FROM token WHERE tokenkey='$decode'");

if(mysqli_num_rows($result) == 0)
{
    echo "none";
}
else{

    $checktoken = checkkey($decode);

    if($checktoken == "Token expired")
    {
        echo $checktoken;
    }
    else {
        echo "sukses";
    }
    // while ($row = mysqli_fetch_array($result)) {
    //     $data[] = $row;
    // }
    
    // return print json_encode(array("data" => $data));
}


?>