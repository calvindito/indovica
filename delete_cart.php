<?php
include 'connection.php';
session_start();
$currency = $_SESSION['currency'];

$kode = $_POST['kode'];
$customer = $_POST['customer'];
if(isset($_POST['jenis'])){
if($_POST['jenis'] == "minus"){
    $sql      = mysqli_query($conn, "UPDATE cart set qty = qty-1 where id = '$kode' ");
    if($sql){
        $query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(qty* product.public_price) as grand FROM `cart` join product on cart.product_id = product.id where customer_id = $customer"));
        $jumlah = mysqli_fetch_assoc(mysqli_query($conn,"SELECT (qty* product.public_price) as total FROM `cart` join product on cart.product_id = product.id where cart.id = $kode"));
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
        $cart = mysqli_query($conn,"SELECT *, cart.id as id_cart FROM cart join product on product.id = cart.product_id where customer_id = $customer");
        $grand_total =0;
        while($row = mysqli_fetch_assoc($cart)){

            $cart_id = $row['id_cart'];
            $qty 	= $row['qty'];
            $product_price 	= $row['public_price'];
            $currency_price = $row['currency'];
                            
                                   if($currency != 'IDR' && $currency_price != 'IDR' ){
                                  
                                        $currency_sql 	= mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency_price'"));
                                        $nominal        = $currency_sql['nominal'];
                                        $idr            = $product_price * $nominal ;
                                        
                                        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency'"));
                                        $nominal2        = $currency2_sql['nominal'];
                                        $harga          = $idr / $nominal2;
                                        $simbol         = $currency2_sql['simbol'];
                                   }else if($currency == 'IDR' && $currency_price != 'IDR'){
                                        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency_price'"));
                                        $nominal2        = $currency2_sql['nominal'];
                                        $harga          = $product_price * $nominal2;
                                        $simbol         = 'Rp';
                                       
                                   }else if($currency != 'IDR' && $currency_price == 'IDR'){
                                        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency'"));
                                        $nominal2        = $currency2_sql['nominal'];
                                        $harga          = $product_price / $nominal2;
                                        $simbol         = $currency2_sql['simbol'];
                                       
                                   }
                                       else{
                                       $simbol = 'Rp';
                                       $harga = $product_price;
                                   }
                                   if($cart_id==$kode){
                                       $total = ($qty * $harga);
                                   }
                                    $total_cart = ($qty * $harga);
                                    $grand_total += $total_cart;
            }
                            
        $response['grand']= $grand_total;
        $response['total'] = $total;
        $response['simbol'] = $simbol;
        $response['status']=200;
        echo json_encode($response);
    }else{
        $response['status']=500;
        echo json_encode( $response);
    }
}

}else{
    $sql      = mysqli_query($conn, "DELETE FROM cart where id = $kode ");
    if($sql){
        $cart = mysqli_query($conn,"SELECT *, cart.id as id_cart FROM cart join product on product.id = cart.product_id where customer_id = $customer");
        $grand_total =0;
        while($row = mysqli_fetch_assoc($cart)){

            $cart_id = $row['id_cart'];
            $qty 	= $row['qty'];
            $product_price 	= $row['public_price'];
            $currency_price = $row['currency'];
                            
                                   if($currency != 'IDR' && $currency_price != 'IDR' ){
                                  
                                        $currency_sql 	= mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency_price'"));
                                        $nominal        = $currency_sql['nominal'];
                                        $idr            = $product_price * $nominal ;
                                        
                                        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency'"));
                                        $nominal2        = $currency2_sql['nominal'];
                                        $harga          = $idr / $nominal2;
                                        $simbol         = $currency2_sql['simbol'];
                                   }else if($currency == 'IDR' && $currency_price != 'IDR'){
                                        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency_price'"));
                                        $nominal2        = $currency2_sql['nominal'];
                                        $harga          = $product_price * $nominal2;
                                        $simbol         = 'Rp';
                                       
                                   }else if($currency != 'IDR' && $currency_price == 'IDR'){
                                        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency'"));
                                        $nominal2        = $currency2_sql['nominal'];
                                        $harga          = $product_price / $nominal2;
                                        $simbol         = $currency2_sql['simbol'];
                                       
                                   }
                                       else{
                                       $simbol = 'Rp';
                                       $harga = $product_price;
                                   }
                                   if($cart_id==$kode){
                                       $total = ($qty * $harga);
                                   }
                                    $total_cart = ($qty * $harga);
                                    $grand_total += $total_cart;
            }
                            
        $response['grand']= $grand_total;
        $response['total'] = $total;
        $response['simbol'] = $simbol;
        $response['status']=200;
        echo json_encode($response);
    }else{
        $response['status']=500;
        echo json_encode($response);
    }

}




?>