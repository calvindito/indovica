<?php

require 'connection.php';

function userfunction($tipe)
{
    global $conn;
    
    if($tipe == "getalluser")
    {
        $sql = "SELECT * FROM customer LEFT JOIN transaksi on transaksi.idcustomer = customer.id GROUP BY customer.id ORDER BY customer.id desc";
        $res = mysqli_query($conn, $sql);
        $row = array();
        if(mysqli_num_rows($res) == 0)
        {
            return "none";
        }
        else{
            while($r = mysqli_fetch_array($res))
            {
                $row[] =$r;
            }
            return json_encode($row);
        }
    }
}

?>