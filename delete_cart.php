<?php
include 'connection.php';

$kode = $_POST['kode'];
$customer = $_POST['customer'];
if(isset($_POST['jenis'])){
if($_POST['jenis'] == "minus"){
    $sql      = mysqli_query($conn, "UPDATE cart set qty = qty-1 where id = '$kode' ");
    if($sql){
        $query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(qty* product.price) as grand FROM `cart` join product on cart.product_id = product.id where customer_id = $customer"));
        $jumlah = mysqli_fetch_assoc(mysqli_query($conn,"SELECT (qty* product.price) as total FROM `cart` join product on cart.product_id = product.id where cart.id = $kode"));
        $response['status']=200;
        $response['grand']= $query['grand'];
        $response['total'] = $jumlah['total'];
        echo json_encode($response);
    }else{
        $response['status']=500;
        echo json_encode($response);
    }
}else if($_POST['jenis'] == "plus"){
    $sql      = mysqli_query($conn, "UPDATE cart set qty = qty+1 where id = '$kode' ");
    if($sql){
        $query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(qty* product.price) as grand FROM `cart` join product on cart.product_id = product.id where customer_id = $customer"));
        $jumlah = mysqli_fetch_assoc(mysqli_query($conn,"SELECT (qty* product.price) as total FROM `cart` join product on cart.product_id = product.id where cart.id = $kode"));
        $response['status']=200;
        $response['grand']= $query['grand'];
        $response['total'] = $jumlah['total'];
        echo json_encode($response);
    }else{
        $response['status']=500;
        echo json_encode( $response);
    }
}

}else{
    $sql      = mysqli_query($conn, "DELETE FROM cart where id = $kode ");
    if($sql){
        $query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(qty* product.price) as grand FROM `cart` join product on cart.product_id = product.id where customer_id = $customer"));
        $response['status']=200;
        $response['grand']= $query['grand'];
        echo json_encode($response);
    }else{
        $response['status']=500;
        echo json_encode($response);
    }

}




?>