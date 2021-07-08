
<?php
session_start();
if(!isset($_SESSION['bahasa'])){
    $bahasa = 'English';
}else{
    $bahasa = $_SESSION['bahasa'];
}
require '../connection.php';
$sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from config where type = 'term-umum'"));
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
        .dropdown {
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

<body class="stretched">
    <div id="wrapper" class="clearfix">
        <header id="header" class="full-header header-size-md">
            <div id="header-wrap" style="border-bottom:2px solid rgba(0, 0, 0, .2);">
                <div class="container">
                    <div class="header-row justify-content-lg-between">
                        <!--<img src = "../assets/store/images/frontend/indovica2.png" style = "position:absolute; top:10px;height:220px;width:100%;">-->
                        <div id="logo">
                            <a href="/" class="standard-logo" data-dark-logo="../assets/store/images/frontend/indovica3.png">
                                <img src="../assets/store/images/frontend/indovica3.png">
                            </a>
                            <a href="/" class="retina-logo mt-2 mb-2" data-dark-logo="../assets/store/images/frontend/indovica3.png">
                                <img src="../assets/store/images/frontend/indovica3.png">
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
                        <div class="header-misc">
                                	<div class="dropdown">
                        		<buttom class="btn btn-outline-danger rounded-pill  dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right;margin-top:10px"><?=$bahasa?></buttom>
                        		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="change_bahasa('English')" href="#">English</a>
                                    <a class="dropdown-item" onclick="change_bahasa('Indonesia')" href="#">Indonesia</a>
                                </div>
                        </div>
                                <div id="top-account">
                                    <div style="width:150px" id="login2">
                                        <a href="index.php" class="menu-link">Sign up/Login</a>
                                        
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>

        </header>




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

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="../assets/store/js/jquery.js"></script>
	<script src="../>assets/store/js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="../assets/store/js/functions.js"></script>

	<script>
	
	$("iframe").contents().find('.goog-te-menu2').css('border', 'none');
	
	$('.carousel').carousel({
  interval: 2000
})
		$(document).ready(changeHeaderColor);
		$(window).on('resize',changeHeaderColor);



		$(window).scroll(function() {
		    
			
		});



		jQuery('#modal-subscribe-form').on( 'formSubmitSuccess', function(){
			$("#modal-subscribe").addClass("fadeOutDown");
			setTimeout(function() { $('#modal-subscribe').modal('hide'); }, 400);
			$("#modal-subscribe").attr("displayed", "false");
		});

		function googleTranslateElementInit() {
 			 new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,en,es,jv,ko,pa,pt,ru,zh-CN', autoDisplay: false}, 'google_translate_element');
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
</html