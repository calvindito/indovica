<?php
session_start();
require '../connection.php';

if(!isset($_SESSION['bahasa'])){
    $bahasa = 'English';
}else{
    $bahasa = $_SESSION['bahasa'];
}

if($bahasa == 'English'){
    $home = 'Home';
    $about = 'About Us';
    $product = 'Product';
    $contact = 'Contact';
    $termandcon ='Term & Condition';
    $login = 'Sign up / Login';
    $myorder = 'My Order';
    $logout = 'Log out';
}else{
    $home = 'Beranda';
    $about = 'Tentang Kami';
    $product = 'Produk';
    $contact = 'Kontak';
    $termandcon ='Syarat & Ketentuan';
    $login = 'Daftar / Masuk';
    $myorder = 'Pesananku';
    $logout = 'Keluar';
}

$sql = mysqlI_fetch_assoc(mysqli_query($conn,"SELECT * from config where `type`='term-umum'"));
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <link rel="shortcut icon" href="../assets/store/images/logo/logo2.PNG">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/store/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../assets/store/style.css" type="text/css" />
    <link rel="stylesheet" href="../assets/store/css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="../assets/store/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="../assets/store/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="../assets/store/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="../assets/store/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="../assets/store/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/store/css/colors.php?color=fc3b3a" type="text/css" />
    <link rel="stylesheet" href="../assets/store/demos/css/fonts.css" type="text/css" />
    <title>VICA</title>
</head>
<style>

#login, #username2, #myorder, #logout {
    display:none;
}

    @media screen and (max-width: 1000px) {
        #top-account {
            right: 0px;
            position: relative;
            float: right;
            margin-right: 10px;
        }
        
        #login2 {
            display: none;
        }
        
        #login,  #username2, #myorder, #logout {
            display:block;
        }

        #responsiveweb {
            width: 100%;
        }

        #kotakkategori {
            padding: 0px !important;
        }

        /*.container {*/

        /*    background-repeat: no-repeat;*/
        /*    background-size: 100px 100px;*/
        /*}*/

        #oc-products {
            padding-left: 0px !important;
            padding-right: 0px !important;
            text-align: center;
        }

        #kotakartikel {
            padding-left: 0px !important;
            padding-right: 0px !important;
            text-align: center;
        }

        .datearticle {
            text-align: center;
        }
    }

    .goog-logo-link {
        display: none !important;
    }

    .goog-to-combo {}


    .goog-te-gadget {
        color: transparent !important;
        float:right;
        margin-top:15px;
        margin-right:18px;
    }

    .centered {
        position: absolute;
        right: 0;
        bottom: 0;
        margin-bottom: 20px;
        margin-right: 20px;
        /*transform: translate(-50%, -50%);*/
    }

</style>

<body class="stretched" style="">
    <div id="wrapper" class="clearfix">
        <div id="top-bar">
			<div class="container-fluid">

				<div class="row">
					<div class="col-6 ">
						<p class="mb-0 py-2 text-md-left" style="margin-top:10px;align-vertical:middle"> <strong>Email:</strong> cs.indovica@gmail.com</p>
					</div>

					<div class="col-6 ">
						<!--<div class="dropdown" id="google_translate_element" placeholder = "choose"></div>-->
                        	<div class="dropdown">
                        		<a href="#" class="text-muted dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right;margin-top:10px; font-size:14px"><?=$bahasa?></a>
                        		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="change_bahasa('English')" href="#" style="font-size: 14px">English</a>
                                    <a class="dropdown-item" onclick="change_bahasa('Indonesia')" href="#" style="font-size: 14px">Indonesia</a>
                                </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
        <header id="header" class="full-header header-size-md">
            <div id="header-wrap" style="border-bottom:2px solid rgba(0, 0, 0, .2);">
                <div class="container">
                    <div class="header-row justify-content-lg-between">
                        <!--<img src = "../assets/store/images/indovica.png" style = "position:absolute; top:10px;height:220px;width:100%;">-->
                        <div id="logo">
                            <a href="/" class="standard-logo" data-dark-logo="../assets/store/images/indovica.png">
                                <img src="../assets/store/images/indovica.png">
                            </a>
                            <a href="/" class="retina-logo mt-2 mb-2" data-dark-logo="../assets/store/images/indovica.png">
                                <img src="../assets/store/images/indovica.png">
                            </a>
                        </div>
                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>
                        <nav class="primary-menu">
                            <!--style = "position:absolute;right:0;top:105px;margin-right:30px;background:url('../assets/store/images/frontend/indovica2.png');>"-->
                            <!-- Menu Left -->
                            <ul class="not-dark menu-container">
                               
                            
                            </ul>
    
                            <div class="header-misc">
                                <div id="top-account">
                                    <div style="width:150px" id="login2">
                                       
                                        <a href="index.php" class="menu-link"><?=$login?></a>
                                        
                                    </div>
                                </div>
                                 
    
                            </div><!-- #top-cart end -->
    
                        </nav>
                    </div>
                    <!--<div id ="responsiveweb" style = "float:right;">-->
                    <!--<div class="dropdown" id="google_translate_element" style="  margin-top:16px;"></div>-->
                    <!--</div>-->
                </div>

            </div>

        </header>


        <div class="modal-register mfp-hide" id="modal-register">
            <div class="card mx-auto" style="max-width: 540px;">
                <div class="card-header py-3 bg-transparent center">
                    <h3 class="mb-0 font-weight-normal">Hello, Welcome Back</h3>
                </div>
                <div class="card-body mx-auto py-5" style="max-width: 70%;">
                    <form id="login-form" name="login-form" class="mb-0 row" action="index.php" method="post">

                        <div class="col-12">
                            <input type="text" id="login-form-username" name="username" value=""
                                class="form-control not-dark" placeholder="Username" />
                        </div>

                        <div class="col-12 mt-4">
                            <input type="password" id="login-form-password" name="password" value=""
                                class="form-control not-dark" placeholder="Password" />
                        </div>

                        <div class="col-12 text-right">
                            <a href="#" class="text-dark font-weight-light mt-2">Forgot Password?</a>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="button btn-block m-0" id="login-form-submit" name="login"
                                value="login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer py-4 center">
                    <p class="mb-0">Don't have an account? <a href="register.php"><u>Sign up</u></a></p>
                </div>
            </div>
        </div>

		
	


		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pb-0">
		
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-12 col-md-12">
							<h2 class="h1 font-weight-bold mb-4 center">Term and Condition:</h2>
							
							<?php if($bahasa == 'English'){ echo $sql['english'] ;}else{ echo $sql['indonesia'];}?>                
						</div>

					
					</div>
					<div class="clear my-5"></div>

			</div>
		</section><!-- #content end -->
	</div><!-- #wrapper end -->








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
								<!-- <li class="mr-2"><img src="../assets/store/demos/xmas/images/cards/visa.svg" alt="Visa" width="34"></li>
								<li class="mr-2"><img src="../assets/store/demos/xmas/images/cards/mc.svg" alt="Master Card" width="34"></li>
								<li class="mr-2"><img src="../assets/store/demos/xmas/images/cards/ae.svg" alt="American Express" width="34"></li>
								<li class="mr-2"><img src="../assets/store/demos/xmas/images/cards/pp.svg" alt="PayPal" width="34"></li> -->
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
	<script src="../assets/store/js/jquery.js"></script>
	<script src="../assets/store/js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="../assets/store/js/functions.js"></script>

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
		
		function change_bahasa(kode){
		    
		    $.ajax({
					type: 'POST',
					url: "../bahasa.php",
					data: {kode: kode},
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