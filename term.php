<?php
session_start();
include 'header.php';
$content = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM config where type = 'term'"));
?>
    <!-- Page Title
		============================================= -->
	

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pb-0">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-12 col-md-6">
						
						   <?php if($bahasa == 'English'){ echo $content['english'];}else{ echo $content['indonesia'];}?>
                            <br>
                            
                                                   
						</div>

						<!--<div class="col-lg-7 col-md-6 mt-4 mt-md-0">-->
      <!--                      <img src="<?=$base_url?>assets/store/images/frontend/pexels-julia-volk-5273061.jpg" alt="">    -->
      <!--                  </div>-->
					</div>
					<div class="clear my-5"></div>
					
				</div>
				<div class="clear"></div>
				

			

			</div>
		</section><!-- #content end -->
<?php

include 'footer.php';


?>