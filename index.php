<?php
session_start();
include 'header.php';
// if(isset($_SESSION['id'])) {
// 	echo '<script>document.location.href="/"</script>';
// }
$product 			= mysqli_query($conn,"SELECT * FROM product where status='accepted' order by id desc");
$product_recommend = mysqli_query($conn,"SELECT * FROM product where status='accepted'");
$articel 			= mysqli_query($conn,"SELECT id, title, author, date,tumbnail from article limit 3");

if(isset($_POST['login'])) {
	$user     = $_POST['username'];
	$password = $_POST['password'];
	$query    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customeronline WHERE (email = '$user' OR username = '$user') "));

	if($query) {
		if(password_verify($password, $query['password'])) {
			$customer_id = $query['id'];
			mysqli_query($conn, "UPDATE cart SET customer_id = '$customer_id' WHERE customer_id = '$session_id'");

			$_SESSION['id']       = $customer_id;
			$_SESSION['name']     = $query['fullname'];
			$_SESSION['phone']    = $query['phone'];
			$_SESSION['username'] = $query['username'];
			$_SESSION['email']    = $query['email'];
			
			echo '<script>document.location.href="index.php"</script>';
		} else {
			echo '<script>alert("Akun tidak ditemukan!");</script>';
			echo '<script>document.location.href="index.php"</script>';
		}
	} else {
		echo '<script>alert("Akun tidak ditemukan!")</script>';
		echo '<script>document.location.href="index.php"</script>';
	}
}


?>
	
<style>


* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
}

.header {
  text-align: center;
  padding: 32px;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    -ms-flex: 50%;
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
}
</style>

	
	    <section id="slider" class="slider-element slider-parallax swiper_wrapper vh-75">
			<div class="slider-inner">
				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark">
							<div class="container">
								<div class="slider-caption slider-caption-center">
									<h2 data-animate="fadeInUp">Vintage & Contemporary Art</h2>
									<p class="mb-4" data-animate="fadeInUp" data-delay="100"></p>
									<div>
										<a href="product.php" data-animate="fadeInUp" data-delay="200" class="button button-large button-white button-light">Shop Now</a>
									</div>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background-image: url('assets/store/images/kolasevica2.jpg');background-color: rgba(0,0,0,0.3); background-blend-mode: multiply;"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Content
		============================================= -->
		<!--<section id="content" style="background-image:url('assets/store/images/bg.jpeg');background-size: 100% 100%;background-size: contain; background-repeat: no-repeat; ">-->
		<section id="content" >
			<div class="content-wrap pb-0">
				<!-- Cart Modal -->
				<div class="modal-register mfp-hide" id="modal-cart">
					<div class="card mx-auto" style="max-width: 400px;">
						<div class="card-body mx-auto py-5" style="max-width: 90%;">
							<h5>Product has been added to the shopping cart</h5>
						</div>
					</div>
				</div>
				<br>
                <div class="container-fluid">
					<div class="center bottommargin">
						<h2 style="background:white">Our Collections</h2>
					</div>
				</div>

				<div class="container-fluid" style = "padding-left:80px;padding-right:80px;"  id = "kotakkategori">
					<div class="row" >
					    
						<div class="col-md-4 mb-5" >
							<div class="card cat-card rounded-0 border-0 dark">
								<img src="<?=$base_url?>/assets/store/images/frontend/vintagecategory.jpg" class="card-img rounded-0" alt="..." height="300px">
							<div class="d-flex align-items-start flex-column card-img-overlay bg p-4">
							
									<div class=" ml-0 centered" style="float:right" ><img src="assets/store/images/bg1.png" style="width:170px;height:50px; float:right;"><span style="float:right;position:absolute;width:100%;text-align:center;margin-top:10px;font-weight:bold;">Vintage</span></div>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-5" >
							<div class="card cat-card rounded-0 border-0 dark">
								<img src="<?=$base_url?>/assets/store/images/frontend/contemp.jpeg" class="card-img rounded-0" alt="..." height="300px">
								<div class="d-flex align-items-start flex-column card-img-overlay bg p-4">
							
									<div class=" ml-0 centered" style="float:right" ><img src="assets/store/images/bg1.png" style="width:170px;height:50px; float:right;"><span style="float:right;position:absolute;width:100%;text-align:center;margin-top:10px;font-weight:bold;">Contemporary</span></div>
								</div>
							</div>
						</div>
						<div class="col-md-4 mb-5" >
							<div class="card cat-card rounded-0 border-0 dark">
								<img src="<?=$base_url?>/assets/store/images/frontend/batik.jpg" class="card-img rounded-0" alt="..." height="300px">
								<div class="d-flex align-items-start flex-column card-img-overlay bg p-4">
							
									<div class=" ml-0 centered" style="float:right" ><img src="assets/store/images/bg1.png" style="width:220px;height:50px; float:right;"><span style="float:right;position:absolute;width:100%;text-align:center;margin-top:10px;font-weight:bold;">Small & Medium Enterprise</span></div>
								</div>
							</div>
						</div>
					
					</div>
				</div>

				<div class="clear"></div>
				<div style="margin-top:100px;">
				<!-- Featured Carousel
					============================================= -->
					<div class="container-fluid">
					<div class="mx-auto center mt-10 bottommargin" style="max-width: 700px; ">
						<h2>Latest Product</h2>
						
					</div>
				</div>

					<div id="oc-products" style="padding-left: 100px;padding-right:100px" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true" data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="5">
						
						<!-- Shop Item 1
						============================================= -->
						<?php if(mysqli_num_rows($product)>0) {
								while($row = mysqli_fetch_assoc($product)){
										$product_id 	= $row['id'];
										$product_name 	= $row['name'];
										$product_image 	= explode(',',$row['image']);
										$product_price 	= $row['public_price'];
								?>
						<div class="oc-item">
							<div class="product">
								<div class="product-image">
									<?php for($i=0;$i<count($product_image);$i++){?>
									<a href="#"><img src="<?=$base_url?>global_assets/images/foto_produk/<?=$product_image[$i]?>" alt="Round Neck T-shirts"></a>
									<?php } ?>
									<div class="bg-overlay">
										<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
											<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
											<a href="detail_product.php?kode=<?=$product_id?>" class="btn btn-dark" ><i class="icon-line-expand"></i></a>
										</div>
										<div class="bg-overlay-bg bg-transparent"></div>
									</div>
								</div>
								<div class="product-desc">
									<div class="product-title mb-1"><?=$product_name?></a></h3></div><br>
									<div class="product-price font-primary"><ins>Rp<?=number_format($product_price)?></ins></div>
								</div>
							</div>
						</div>
						<?php }} ?>
					</div>
				</div>

				<div style="margin-top:100px">
				<!-- Featured Carousel
					============================================= -->
				
						<div class="container-fluid">
					<div class="mx-auto center bottommargin" >
						<h2>Recommended </h2>
					</div>
				</div>

					<div id="oc-products" style="padding-left:100px;padding-right:100px" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true" data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-items-xl="5">
						
						<!-- Shop Item 1
						============================================= -->
						<?php if(mysqli_num_rows($product)>0) {
								while($row = mysqli_fetch_assoc($product_recommend)){
										$product_id 	= $row['id'];
										$product_name 	= $row['name'];
										$product_image 	= explode(',',$row['image']);
										$product_price 	= $row['public_price'];
								?>
						<div class="oc-item">
							<div class="product">
								<div class="product-image">
									<?php for($i=0;$i<count($product_image);$i++){?>
									<a href="#"><img src="<?=$base_url?>global_assets/images/foto_produk/<?=$product_image[$i]?>" alt="Round Neck T-shirts"></a>
									<?php } ?>
									<div class="bg-overlay">
										<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
											<a href="#" class="btn btn-dark mr-2"><i class="icon-shopping-basket"></i></a>
											<a href="detail_product.php?kode=<?=$product_id?>" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
										</div>
										<div class="bg-overlay-bg bg-transparent"></div>
									</div>
								</div>
								<div class="product-desc">
									<div class="product-title mb-1"><?=$product_name?></a></h3></div><br>
									<div class="product-price font-primary"><ins>Rp<?=number_format($product_price)?></ins></div>
								</div>
							</div>
						</div>
						<?php }} ?>
					</div>
				</div>

				<div  id = "kotakartikel" style="padding-right:100px;padding-left:100px; margin-top:100px;">
				<!-- Featured Carousel
					============================================= -->
				<div class="mx-auto center bottommargin" style="max-width: 700px">
						<h2>Article </h2>
					</div>
					<div class="row posts-md col-mb-30">
					<?php while($data = mysqli_fetch_assoc($articel)) {
						$foto = $data['tumbnail'];
						$date=date_create($data['date']);
						$id=$data['id'];
						
						?>
					
						<div class="entry col-sm-6 col-md-4">
							<div class="grid-inner">
								<div class="entry-image">
									<a href="article.php?kode=<?=$id?>"><img src="global_assets/images/tumbnail/<?=$foto?>" alt="Image" style="height: 280px"></a>
								</div>
								<div class="entry-title title-xs nott">
									<h3><a href="article.php?kode=<?=$id?>"><?=$data['title']?></a></h3>
								</div>
								<div class="entry-meta" >
								     <i class="icon-calendar3"></i><?=date_format($date,"d F Y");?>
									
								</div>
								<div class="entry-content">
									<p class="mb-0"></p>
								</div>
							</div>
						</div>

					
					<?php }?>
					</div>
				</div>

				

			</div>
		</section><!-- #content end -->
		<br><br><br>
<?php
include 'footer.php';
?>