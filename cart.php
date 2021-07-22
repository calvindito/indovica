<?php
session_start();
include 'header.php';

$cart = mysqli_query($conn,"SELECT *, cart.id as id_cart FROM cart join product on product.id = cart.product_id where customer_id = $customer_id");
// if($cart)
// {
// 	echo "test";
// }
// else {
// 	echo "who";
// }
// var_dump($cart);
?>
    <!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('<?=$base_url?>assets/images/frontend/pexels-mingche-lee-3720778.jpg'); background-size: cover; padding: 170px 0 100px;" data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

			<div class="container clearfix">
				<h1>Shopping Cart</h1>
			
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pb-0">

				<div class="container-fluid topmargin">
					<div class="row">
						<div class="col-12">
                        <table class="table cart mb-5">
						<thead>
							<tr>
								<th class="cart-product-remove">&nbsp;</th>
								<th class="cart-product-thumbnail">&nbsp;</th>
								<th class="cart-product-name">Product</th>
								<th class="cart-product-price">Unit Price</th>
								<th class="cart-product-quantity">Quantity</th>
								<th class="cart-product-subtotal">Total</th>
							</tr>
						</thead>
						<tbody>
                            <?php $grand_total=0;
                            if(mysqli_num_rows($cart) > 0){
                            while($row = mysqli_fetch_assoc($cart)){
                                $cart_id = $row['id_cart'];
                                $image = explode(',',$row['image']);
                                $total_cart = $row['qty']*$row['price'];
								$grand_total += $total_cart;
                                ?>
							<tr class="cart_item" id="no<?=$cart_id?>">
								<td class="cart-product-remove">
									<a href="#" onclick="remove(<?=$cart_id?>)" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
								</td>

								<td class="cart-product-thumbnail">
									<a href="#"><img width="64" height="64" src="<?=$base_url?>global_assets/images/foto_produk/<?=$image[0]?>" alt="<?=$row['name']?>"></a>
								</td>

								<td class="cart-product-name">
									<a href="#"><?=$row['name']?></a>
								</td>

								<td class="cart-product-price">
									<span class="amount">RP <?=number_format($row['price'])?></span>
								</td>

								<td class="cart-product-quantity">
									<div class="quantity">
										<input type="button" value="-" class="minus" onclick="minus(<?=$cart_id?>)">
										<input type="text" id="qty<?=$cart_id?>" name="quantity" value="<?=$row['qty']?>" class="qty" />
										<input type="button" value="+" class="plus" onclick="plus(<?=$cart_id?>)">
									</div>
								</td>

								<td class="cart-product-subtotal">
									<span class="amount" id="total<?=$cart_id?>">RP <?=number_format($total_cart)?></span>
								</td>
							</tr>
                            <?php } } ?>
							
							<tr class="cart_item">
								<td colspan="6">
									<div class="row justify-content-between py-2 col-mb-30">
										<div class="col-lg-auto pl-lg-0" >
											<h4 id="grand">Grand Total : Rp <?=number_format($grand_total)?></h4> 
										</div>
										<div class="col-lg-auto pr-lg-0">
											<!-- <a href="#" class="button button-3d m-0">Update Cart</a> -->
											<a href="checkout.php" class="button button-3d mt-2 mt-sm-0 mr-0">Proceed to Checkout</a>
										</div>
									</div>
								</td>
							</tr>
						</tbody>

					</table>
						</div>
					</div>
				</div>

				

			</div>
		</section><!-- #content end -->
        <?php
include 'footer.php';
?>

<script>

<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
function remove(id){
	var customer = <?=$customer_id?>;
    var x = "#no"+id;

    $.ajax({
     type: 'POST',
     url: "delete_cart.php",
     data: {kode: id,customer:customer},
	 dataType:'JSON',
      success: function(data) {
		  if(data.status=='200'){
			$(x).remove(); 
			$("#grand").val("Grand Total : Rp. "+numberWithComas(data.grand));
		  }
      }
    })
}

function minus(id){
	var customer = <?=$customer_id?>;
	var jumlah  = $("#qty"+id).val();
    $.ajax({
     type: 'POST',
     url: "delete_cart.php",
     data: {kode: id,jenis: 'minus',customer:customer},
	 dataType:'JSON',
      success: function(data) {
		  if(data.status=='200'){
			$("#total"+id).html("Rp "+data.total);
			$("#grand").html("Grand Total : Rp."+numberWithComas(data.grand));
		  }
      }
    })
}

function plus(id){
	var customer = <?=$customer_id?>;
	var jumlah  = $("#qty"+id).val();
    $.ajax({
     type: 'POST',
     url: "delete_cart.php",
     data: {kode: id,jenis: 'plus',customer:customer},
	 dataType:'JSON',
      success: function(data) {
		  if(data.status=='200'){

			$("#total"+id).html("Rp "+numberWithComas(data.total));
			$("#grand").html("Grand Total : Rp."+numberWithComas(data.grand));
		  }
      }
    })

}
</script>
</script>