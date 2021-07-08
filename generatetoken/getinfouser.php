<?php
function getinfo($myid){
    require __DIR__ . '/../connection.php';
    $sql = "select * from customer inner join transaksi on transaksi.idcustomer = customer.id inner join detailtransaksi on detailtransaksi.idtransaksi = transaksi.idtransaksi where id = '$myid' group by detailtransaksi.iddetail";
    $res = $conn->query($sql);
    $row = array();
    if($res->num_rows == 0)
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
?>