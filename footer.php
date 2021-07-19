
		
	
		<!-- Footer
		============================================= -->
		<footer id="footer" class="bg-color dark border-0">

			

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container-fluid clearfix">

					<div class="row justify-content-between align-items-center">
						<div class="col-md-6" style="color:white !important">
							Copyrights &copy; 2021 All Rights Reserved by VICA<br>
							<div class="copyright-links"><a href="term.php" style="color:white !important">Terms & Condition</a> </div>
							<!-- / <a href="#">Privacy Policy</a> -->
						</div>

						<div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
							<ul class="list-unstyled d-flex flex-row mb-2 clearfix">
								<!-- <li class="mr-2"><img src="<?=$base_url?>assets/store/demos/xmas/images/cards/visa.svg" alt="Visa" width="34"></li>
								<li class="mr-2"><img src="<?=$base_url?>assets/store/demos/xmas/images/cards/mc.svg" alt="Master Card" width="34"></li>
								<li class="mr-2"><img src="<?=$base_url?>assets/store/demos/xmas/images/cards/ae.svg" alt="American Express" width="34"></li>
								<li class="mr-2"><img src="<?=$base_url?>assets/store/demos/xmas/images/cards/pp.svg" alt="PayPal" width="34"></li> -->
							</ul>
							<div class="copyrights-menu copyright-links clearfix">
								<a href="aboutus.php" style="color:white !important">About</a>/<a href="#" style="color:white !important">Features</a>
								<!-- /<a href="#">FAQs</a> -->
							</div>
						</div>
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="<?=$base_url?>assets/store/js/jquery.js"></script>
	<script src="<?=$base_url?>assets/store/js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?=$base_url?>assets/store/js/functions.js"></script>

	<script>
	
	$("iframe").contents().find('.goog-te-menu2').css('border', 'none');
	
	$('.carousel').carousel({
  interval: 2000
})
// 		$(document).ready(changeHeaderColor);
		$(window).on('resize',changeHeaderColor);

// 		function changeHeaderColor(){
// 			if (jQuery(window).width() > 991.98) {
// 				jQuery( "#header" ).hover(
// 					function() {
// 						if (!$(this).hasClass("sticky-header")) {
// 							$( this ).addClass( "hover-light" ).removeClass( "dark" );
// 							SEMICOLON.header.logo();
// 						}
// 						$( "#wrapper" ).addClass( "header-overlay" );
// 					}, function() {
// 						if (!$(this).hasClass("sticky-header")) {
// 							$( this ).removeClass( "hover-light" ).addClass( "dark" );
// 							SEMICOLON.header.logo();
// 						}
// 						$( "#wrapper" ).removeClass( "header-overlay" );
// 					}
// 				);
// 			}
// 		};

		$(window).scroll(function() {
		    
			
		});



		jQuery('#modal-subscribe-form').on( 'formSubmitSuccess', function(){
			$("#modal-subscribe").addClass("fadeOutDown");
			setTimeout(function() { $('#modal-subscribe').modal('hide'); }, 400);
			$("#modal-subscribe").attr("displayed", "false");
		});

		function googleTranslateElementInit() {
 			 new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,id', autoDisplay: false}, 'google_translate_element');
		}
		
		function change_bahasa(){
		    var kodebahasa = $('#bahasa').val();
		    var kodecurrency = $('#currency').val();
			$.ajax({
					type: 'POST',
					url: "bahasa.php",
					data: {kodeb: kodebahasa,kodec:kodecurrency},
					dataType: 'JSON',
					success: function(data) {
						location.reload();
					}
            	});
		}
		  

	</script>
	
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



</body>
</html>