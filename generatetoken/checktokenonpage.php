<?php
include 'validatejwt.php';


function checktokenonmypage($mytoken)
{
    require __DIR__ . '/../connection.php';
    $token = $mytoken;
    $decodetoken = base64_decode($token);
    
    $sql = "select tokenkey from token where tokenkey = '$decodetoken'";
    $result = $conn->query($sql);
    
    if($result->num_rows == 0)
    {
        return "none";
    }
    else{
    
        $checktoken = checkkey($decodetoken);
     
        if($checktoken == "Token expired")
        {
            return $checktoken;
        }
        else {
            return "sukses";
        }
        // while ($row = mysqli_fetch_array($result)) {
        //     $data[] = $row;
        // }
        
        // return print json_encode(array("data" => $data));
    }
}



?>