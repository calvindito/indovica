<?php
session_start();
include 'header.php';

$content = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM config where type = 'aboutus'"));
?>
    <!-- Page Title
		============================================= -->
	

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pb-0">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-12 col-md-12">
<!--							<h2 class="h1 font-weight-bold mb-4 center">INDOVICA at a glance :</h2>-->
<!--							<p style="text-align: justify;"><b>From one corner of the "city of heroes" Surabaya, East Java. The second largest city in Indonesia.<br><br>-->
<!--SPREADING INDONESIAN PRODUCTS THROUGHOUT THE WORLD</b><br><br>-->

<!--INDOVICA is a “startup” created as a bridge to bring together young contemporary art artists, producers, entrepreneurs, sellers (what is meant here are Small and Medium Enterprises/SMEs) from Indonesia with buyers from other countries through a “platform” facility.<br><br>-->

<!--Now ; distance, space and time are no longer inhibiting factors. <br><br>-->

<!--INDOVICA was born in the midst of the protracted "Covid-19 Pandemic" situation that has ravaged almost all aspects of life.<br>-->

<!--Life must continue, based on optimism that all parties should work together, join hands and support each other through their respective expertise, facilities and fields.<br><br>-->

<!--</p>-->
<!--                            <br>-->
                                                   
<!--						</div>-->
<!--						<div class="col-lg-6 col-md-12">-->
<!--						    <br><br><br>-->
<!--						    <div id="demo-gallery" class="masonry-thumbs grid-container grid-3" data-big="2" data-lightbox="gallery">-->
<!--        						<a href="images/portfolio/full/1.jpg" data-lightbox="gallery-item" class="grid-item pf-icons pf-media"><img src="assets/store/images/keramik.jpg" alt="Gallery Thumb 1"></a>-->
<!--        						<a href="images/portfolio/full/2.jpg" data-lightbox="gallery-item" class="grid-item pf-illustrations pf-uielements"><img src="assets/store/images/UMKM9.jpg" alt="Gallery Thumb 2"></a>-->
<!--        						<a href="images/portfolio/full/3.jpg" data-lightbox="gallery-item" class="grid-item pf-uielements pf-graphics"><img src="assets/store/images/Contempo5.jpg" alt="Gallery Thumb 3"></a>-->
<!--        					</div>-->
<!--						</div>-->

					
<!--					</div>-->
<!--					<div class="row justify-content-between">-->
					    
<!--Realizing that the market area is very wide, the types of products are very many, we limit ourselves to focus on a few types or product categories. This is closely related to selectivity to match the target market that has been set.<br><br>-->

<!--eCommerce, Startup, Platform and Marketplace, are no longer just terms. It has become an important thing that cannot be separated from the daily life of most people. In urban areas, in rural areas, young and old are all involved.<br><br>-->

<!--INDOVICA is certainly a part of this phenomenon.<br>-->

<!--Hopefully this platform can really provide great benefits for all parties.<br>-->
					    
<!--					</div>-->
<!--					<div class="clear my-5"></div>-->
					 <?php if($bahasa == 'English'){ echo $content['english'];}else{ echo $content['indonesia'];}?>
				</div>
				<div class="clear"></div>
				

			

			</div>
		</section><!-- #content end -->
<?php

include 'footer.php';
?>