<?php
session_start();
include 'header.php';

$product_id = $_GET['kode'];
$detail     = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product where id = $product_id"));
if(!isset($product_id) || !$detail) {
    echo '<script>alert("Product not found!")</script>';
    echo '<script>document.location.href="shop.php"</script>';
 }else{
    $image      = explode(',',$detail['image']);

 }

if(isset($_POST['add_to_cart'])) {
   if($_SESSION['id']){
		$sql = "SELECT * FROM cart WHERE product_id = $product_id AND customer_id = '$customer_id' ";
		$check      = mysqli_fetch_assoc(mysqli_query($conn, $sql));
		if($check) {
		$id_cart = $check['id'];
		$qty     = $check['qty'] + $_POST['qty'];
		mysqli_query($conn, "UPDATE cart SET qty = $qty WHERE id=$id_cart");
		} else {
		$qty = $_POST['qty'];
			mysqli_query($conn, "INSERT INTO cart VALUES ('','$customer_id', $product_id ,$qty)");

		}
		echo '<script>alert("Success")</script>';
		echo "<script>document.location.href='detail_product.php?kode=$product_id'</script>";   
	}else{
		echo '<script>alert("You must be logged in!")</script>';
		echo "<script>document.location.href='detail_product.php?kode=$product_id'</script>";
	}  
 }

?>	
    <!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('<?=$base_url?>assets/store/images/frontend/pexels-mingche-lee-3720778.jpg'); background-size: cover; padding: 170px 0 100px;" data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

			<div class="container clearfix">
				<h1><?=$detail['name']?></h1>
				<span>Watches</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Product</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pb-0">

				

				<div class="clear"></div>

				<div class="single-product mb-6">
					<div class="product">
						<div class="container-fluid">
							<div class="row gutter-50">
								<div class="col-xl-7 col-lg-5 mb-0 sticky-sidebar-wrap">
									<div class="masonry-thumbs grid-container grid-2" data-lightbox="gallery">
                                        <?php for($i= 0;$i < count($image) ; $i++){?>
										<a class="grid-item" href="assets/store/images/foto_produk/<?=$image[$i]?>" data-lightbox="gallery-item"><img src="assets/store/images/foto_produk/<?=$image[$i]?>" alt="Watch 1"></a>
										<?php } ?>
									</div>

								</div>
								<div class="col-xl-5 col-lg-7 mb-0">

									<div class="d-flex align-items-center justify-content-between">

										<!-- Product Single - Price
										============================================= -->
										<div class="product-price"> <ins>Rp <?= number_format($detail['price']); ?></ins></div><!-- Product Single - Price End -->

										<!-- Product Single - Rating
										============================================= -->
										<!-- <div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star-half-full"></i>
											<i class="icon-star-empty"></i>
										</div> -->
                                        <!-- Product Single - Rating End -->

									</div>

									<div class="line line-sm"></div>

									<!-- Product Single - Quantity & Cart Button
									============================================= -->
									<form class="cart mb-0 d-flex justify-content-between align-items-center" method="post" enctype='multipart/form-data' action="detail_product.php?kode=<?=$product_id?>">
										<div class="quantity clearfix">
											<input type="button" value="-" class="minus">
											<input type="number" step="1" min="1" name="qty" value="1" title="Qty" class="qty" />
											<input type="button" value="+" class="plus">
										</div>
										<button type="submit" name="add_to_cart" class="add-to-cart button button-large m-0">Add to cart</button>
									</form><!-- Product Single - Quantity & Cart Button End -->

									<div class="line line-sm"></div>

									<div data-readmore="true" data-readmore-size="250px" data-readmore-trigger-open="Read More <i class='icon-angle-down'></i>" data-readmore-trigger-close="false">
<h3>Vintage Art</h3>

										<!-- Product Single - Short Description
										============================================= -->
									<p><i>"something from the past of high quality...representing the best of its kind".</i><br><br>
Vintage art is defined by <i>us</i> as high quality art from the 18th century to 1950s, characterized by excellence and enduring appeal.
Most vintage art was created by talented professional illustrators, who specialized in accurately portraying the natural world.</p>
										<!-- <ul class="iconlist mb-0">
											<li><i class="icon-caret-right"></i> Dynamic Color Options</li>
											<li><i class="icon-caret-right"></i> Lots of Size Options</li>
											<li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
										</ul> -->
										<!-- Product Single - Short Description End -->

										<a href="#" class="btn btn-dark btn-sm read-more-trigger"></a>
									</div>

									<!-- Product Single - Meta
									============================================= -->
									<div class="card product-meta mt-4 mb-5 rounded-0">
										<!-- <div class="card-body">
											<span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">8465415</span></span>
											<span class="posted_in">Category: <a href="#" rel="tag">Dress</a>.</span>
											<span class="tagged_as">Tags: <a href="#" rel="tag">Pink</a>, <a href="#" rel="tag">Short</a>, <a href="#" rel="tag">Dress</a>, <a href="#" rel="tag">Printed</a>.</span>
										</div> -->
									</div><!-- Product Single - Meta End -->

									<div>
										<!-- <h4>Product Details</h4>
										<table class="table table-striped table-bordered mb-5">
											<tbody>
												<tr>
													<th width="150">Item</th>
													<th>Description</th>
												</tr>
												<tr>
													<td>Display</td>
													<td>Analogue</td>
												</tr>
												<tr>
													<td>Movement</td>
													<td>Quartz</td>
												</tr>
												<tr>
													<td>Power source</td>
													<td>Battery</td>
												</tr>
												<tr>
													<td>Dial style</td>
													<td>Solid round stainless steel dial</td>
												</tr>
												<tr>
													<td>Features</td>
													<td>Reset Time</td>
												</tr>
												<tr>
													<td>Strap style</td>
													<td>Silver-Toned bracelet style, stainless steel strap with a foldover closure</td>
												</tr>
												<tr>
													<td>Water resistance</td>
													<td>Yes</td>
												</tr>
												<tr>
													<td>Warranty</td>
													<td>3 Months</td>
												</tr>
											</tbody>
										</table>

										<h4>Size & Fit</h4>
										<table class="table table-striped table-bordered">
											<tbody>
												<tr>
													<td>Dial width</td>
													<td>40 mm</td>
												</tr>
												<tr>
													<td>Strap Width</td>
													<td>20 mm</td>
												</tr>
											</tbody>
										</table> -->
									</div>

									<!-- Product Single - Share
									============================================= -->
									<!-- <div class="si-share d-flex justify-content-between align-items-center mt-4 border-0">
										<h4 class="mb-0">Share:</h4>
										<div>
											<a href="#" class="social-icon si-borderless si-facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-pinterest">
												<i class="icon-pinterest"></i>
												<i class="icon-pinterest"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-gplus">
												<i class="icon-gplus"></i>
												<i class="icon-gplus"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-rss">
												<i class="icon-rss"></i>
												<i class="icon-rss"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-email3">
												<i class="icon-email3"></i>
												<i class="icon-email3"></i>
											</a>
										</div>
									</div> -->
									<!-- Product Single - Share End -->

								</div>

							</div>
						</div>
					</div>
				</div>

				
		</section><!-- #content end -->
<?php
include 'footer.php';
?>