<?php
session_start();
include 'header.php';


$cart = mysqli_query($conn,"SELECT * FROM cart join product on product.id = cart.product_id where customer_id = $customer_id");

if(!isset($_SESSION['id']) || mysqli_num_rows($cart) < 1) {
    echo '<script>document.location.href="login.php"</script>';
 }
?>

	 <!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('<?=$base_url?>assets/store/images/frontend/pexels-mingche-lee-3720778.jpg'); background-size: cover; padding: 170px 0 100px;" data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

			<div class="container clearfix">
				<h1>Checkout</h1>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
            <form id="shipping-form" name="shipping-form" class="row mb-0" action="" method="post">

				<div class="container clearfix">

					<div class="row col-mb-50 gutter-50">
						

						<div class="col-lg-12">
							<h3 style="padding-left:15px;padding-right:15px">Shipping Address</h3>
                                <div class="row" style="padding-left:15px;padding-right:15px">
								<div class="col-md-6 form-group">
									<label for="shipping-form-name">Name:</label>
									<input type="text" id="shipping-form-name" name="name" value="" class="sm-form-control" />
								</div>

								<div class="col-md-6 form-group">
									<label for="shipping-form-phone">Phone:</label>
									<input type="text" id="shipping-form-phone" name="phone" value="" class="sm-form-control" />
								</div>
                                </div>

								<div class="col-12 form-group">
									<label for="shipping-form-address">Address:</label>
									<input type="text" id="shipping-form-address" name="address" value="" class="sm-form-control" />
								</div>
                                <div class="col-12 form-group">
									<label for="shipping-form-province">Province</label>
									<input type="text" id="shipping-form-province" name="province" value="" class="sm-form-control" />
								</div>
								<div class="col-12 form-group">
									<label for="shipping-form-city">City / Town</label>
									<input type="text" id="shipping-form-city" name="city" value="" class="sm-form-control" />
								</div>
                                <div class="col-12 form-group">
									<label for="shipping-form-district">District</label>
									<input type="text" id="shipping-form-district" name="district" value="" class="sm-form-control" />
                                    <input type="text" name="submit_order" value="ok" hidden>
                                </div>

								<div class="col-12 form-group">
									<label for="shipping-form-message">Notes <small>*</small></label>
									<textarea class="sm-form-control" id="shipping-form-message" name="shipping-form-message" rows="6" cols="30"></textarea>
								</div>

							
						</div>

						<div class="w-100"></div>

						<div class="col-lg-6">
							<h4 style="padding-left:15px;padding-right:15px">Your Orders</h4>

							<div class="table-responsive">
								<table class="table cart">
									<thead>
										<tr>
											<th class="cart-product-thumbnail">&nbsp;</th>
											<th class="cart-product-name">Product</th>
											<th class="cart-product-quantity">Quantity</th>
											<th class="cart-product-subtotal">Total</th>
										</tr>
									</thead>
									<tbody>
                                        <?php 
                                            if(mysqli_num_rows($cart) > 0){
                                                $total = 0;
                                                while($row = mysqli_fetch_assoc($cart)){
                                                $cart_id = $row['id'];
                                                $image = explode(',',$row['image']);
                                                $subtotal = $row['qty']*$row['price'];
                                                $total += $subtotal;
                                        ?>
										<tr class="cart_item">
											<td class="cart-product-thumbnail">
												<a href="#"><img width="64" height="64" src="<?=$base_url?>assets/store/images/foto_produk/<?=$image[0]?>" alt="Pink Printed Dress"></a>
											</td>

											<td class="cart-product-name">
												<a href="#"><?=$row['name']?></a>
											</td>

											<td class="cart-product-quantity">
												<div class="quantity clearfix">
												<?=$row['qty']?>
												</div>
											</td>

											<td class="cart-product-subtotal">
												<span class="amount">RP <?=number_format($subtotal)?></span>
											</td>
										</tr>
                                        <?php } }?>
										
									</tbody>

								</table>
							</div>
						</div>

						<div class="col-lg-6">
							<h4 style="padding-left:15px;padding-right:15px">Cart Totals</h4>

							<div class="table-responsive">
								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="border-top-0 cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>

											<td class="border-top-0 cart-product-name">
												<span class="amount">RP <?=number_format($total)?></span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Shipping</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">Free Delivery</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount color lead"><strong>RP <?=number_format($total)?></strong></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

							<h4 style="padding-left:15px;padding-right:15px">Payment Method</h4>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bank" style="margin-left:15px;padding-right:15px">
                            <label for="vehicle1"> Bank</label><br>
                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Paypal" style="margin-left:15px;padding-right:15px">
                            <label for="vehicle2" > Paypal</label><br>
							<button type="submit"  class="button button-3d float-right">Place Order</button>
						</div>
					</div>
				</div>
                </form>
			</div>
		</section><!-- #content end -->

<?php
include 'footer.php';
?>


<?php 

if(isset($_POST['submit_order'])) {
   $billing_name        = $_POST['name'];
   $billing_telepon     = $_POST['phone'];
   $billing_address     = $_POST['address'];
   $billing_province_id = $_POST['province'];
   $billing_city_id     = $_POST['city'];
   $billing_district_id = $_POST['district'];

   $insert_address      = mysqli_query($conn, "INSERT INTO address VALUES ('','$billing_name', '$billing_telepon', '$billing_address', '$billing_province_id', '$billing_city_id', '$billing_district_id', $customer_id)");

   if($insert_address) {
      
      $address_id         = mysqli_insert_id($conn);
      $tanggal            = date('Y-m-d H:i:s');
      $subtotal           = $total;
      $insert_transaction = mysqli_query($conn, "INSERT INTO transaction VALUES ('','$tanggal' ,$customer_id, $address_id,$subtotal, 0, $subtotal, 'Bank', 'unpaid', 'pending')");
      

      if($insert_transaction) {
         $produk       = [];
         $transaction_id = mysqli_insert_id($conn);
         $cart           = mysqli_query($conn, "SELECT cart.qty, product.price, product.id FROM cart LEFT JOIN product ON product.id = cart.product_id WHERE cart.customer_id = '$customer_id' GROUP BY cart.product_id");
         while($row = mysqli_fetch_assoc($cart)) {
               $product_id = $row['id'];
               $qty        = $row['qty'];
               $price      = $row['price'];
               $total      = $price * $qty;

               mysqli_query($conn, "INSERT INTO transaction_detail VALUES ('', $transaction_id, $product_id,$qty, $price)");
         }
         mysqli_query($conn,"DELETE FROM cart where customer_id = $customer_id");

         echo '<script>alert("Success!")</script>';
         echo '<script>document.location.href="index.php"</script>';
      }
   }
}


?>