<?php

require 'connection.php';

if(!isset($_SESSION['bahasa'])){
    $bahasa = 'English';
}else{
    $bahasa = $_SESSION['bahasa'];
}

if(!isset($_SESSION['currency'])){
    $currency = 'IDR';
}else{
    $currency = $_SESSION['currency'];
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
if(isset($_SESSION['id'])){
    $customer_id = $_SESSION['id'];
	$cart = mysqli_query($conn, "SELECT cart.id, cart.qty,cart.product_id, product.name, product.image, product.price FROM cart LEFT JOIN product ON product.id = cart.product_id  WHERE cart.customer_id = '$customer_id'  group by cart.product_id");
    $total_cart2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(qty) as qty from cart where customer_id = $customer_id"));
    $total = $total_cart2['qty'];
    
}else{
    $total=0;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <link rel="shortcut icon" href="<?=$base_url?>assets/store/images/logo/logo2.PNG">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/style.css" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=$base_url?>assets/store/css/colors.php?color=fc3b3a" type="text/css" />
    <link rel="stylesheet" href="<?=$base_url?>assets/store/demos/css/fonts.css" type="text/css" />
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
                                <a href="javascript(void:0)" class="text-muted dropdown-toggle" data-toggle="modal" data-target="#modalbahasa" style="float:right;margin-top:10px; font-size:14px"><?=strtoupper($bahasa)?> / <?=$currency?></a>
                        		<!-- <a href="javascript(void:0)" class="text-muted dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right;margin-top:10px; font-size:14px"><?=$bahasa?></a>
                        		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="change_bahasa('English')" href="#" style="font-size: 14px">English</a>
                                    <a class="dropdown-item" onclick="change_bahasa('Indonesia')" href="#" style="font-size: 14px">Indonesia</a>
                                </div> -->
                            </div>
					</div>
				</div>
			</div>
		</div>
        <header id="header" class="full-header header-size-md">
            <div id="header-wrap" style="border-bottom:2px solid rgba(0, 0, 0, .2);">
                <div class="container">
                    <div class="header-row justify-content-lg-between">
                        <!--<img src = "<?=$base_url?>assets/store/images/indovica.png" style = "position:absolute; top:10px;height:220px;width:100%;">-->
                        <div id="logo">
                            <a href="/" class="standard-logo" data-dark-logo="<?=$base_url?>assets/store/images/indovica.png">
                                <img src="<?=$base_url?>assets/store/images/indovica.png">
                            </a>
                            <a href="/" class="retina-logo mt-2 mb-2" data-dark-logo="<?=$base_url?>assets/store/images/indovica.png">
                                <img src="<?=$base_url?>assets/store/images/indovica.png">
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
                            <!--style = "position:absolute;right:0;top:105px;margin-right:30px;background:url('<?=$base_url?>assets/store/images/frontend/indovica2.png');>"-->
                            <!-- Menu Left -->
                            <ul class="not-dark menu-container">
                                <li class="menu-item"><a class="menu-link" href="index.php">
                                        <div><?=$home?></div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="product.php">
                                        <div><?=$product?></div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="aboutus.php">
                                        <div><?=$about?></div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="contact.php">
                                        <div><?=$contact?></div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="term.php">
                                        <div><?=$termandcon?></div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="admin-login">
                                        <div>Vendor</div>
                                    </a></li>
                                
                                <?php if(!isset($_SESSION['name'])){?>
                                <li class="menu-item" id="login">
                                        <a href="#modal-register" data-lightbox="inline" class="menu-link"><?=$login?></a>
                                    
                                </liv>
                                
                                <?php } else { ?>
                                <li><a class="menu-link"></a></li>
                                 <li class="menu-item" id="username2">
                                        <a class="menu-link" style="font-size:14px;" href="#">Hi, <?=ucfirst($_SESSION['username']) ?></a>
                                 
                                </li>
                                 <li class="menu-item" id="myorder" >   
                                    
                                                <a class="menu-link" style="font-size:14px;" href="my_order.php"><?=$myorder?></a>
                                  
                                </li>
                                <li class="menu-item" id="logout">
                                    <div>
                                        <a class="menu-link" style="font-size:14px;" href="logout.php"><?=$logout?></a>
                                    </div>
                                    
                                </li>
                                
                                <?php } ?>
                            
                            </ul>
    
                            <div class="header-misc">
                                <div id="top-account">
                                    <div style="width:150px" id="login2">
                                        <?php if(!isset($_SESSION['name'])){?>
    
                                        <a href="#modal-register" data-lightbox="inline" class="menu-link"><?=$login?></a>
                                        <?php } else { ?>
                                        <div class="dropdown header-misc-icon" >
                                            <a href="javascript:void(0);" class="dropdown-toggle" id="navbarDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="icon-line2-user mr-1 position-relative"></i>
                                                <span
                                                    class="d-none d-sm-inline-block font-primary" style=" white-space: nowrap; width: 90px;   overflow: hidden;  text-overflow: ellipsis; " ><?= $_SESSION['username'] ?></span>
                                            </a>
                                            <div class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" style="font-size:14px;" href="#"><?=ucfirst($_SESSION['username']) ?></a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" style="font-size:14px;" href="my_order.php"><?=$myorder?></a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" style="font-size:14px;" href="logout.php"><?=$logout?></a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                                    <a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span
                                            class="top-cart-number"><?=$total?></span></a>
                                    <div class="top-cart-content">
                                        <div class="top-cart-title">
                                            <h4>Shopping Cart</h4>
                                        </div>
                                        <div class="top-cart-items">
    
                                            <?php if(isset($_SESSION['id']) && mysqli_num_rows($cart)> 0) 
    										{
    									?>
    
                                            <div class="top-cart-item">
                                                <?php $total_cart = 0; ?>
                                                <?php while($row = mysqli_fetch_assoc($cart)) { 
    													$image 	= explode(',',$row['image']);
    													$name 	= $row['name'];
    													$qty 	= $row['qty'];
    													$price 	= $row['price'];
    													$total_cart += ($qty * $price);
    												?>
                                                <div class="top-cart-item-image">
                                                    <a href="#"><img
                                                            src="<?=$base_url?>assets/store/images/foto_produk/<?=$image[0]?>"
                                                            alt="Blue Shoulder Bag" /></a>
                                                </div>
                                                <div class="top-cart-item-desc">
                                                    <div class="top-cart-item-desc-title">
                                                        <a href="#" class="font-weight-normal"><?=$name?></a>
                                                        <span class="top-cart-item-price d-block">Rp
                                                            <?= number_format($price); ?></span>
                                                    </div>
                                                    <div class="top-cart-item-quantity font-weight-semibold">x <?=$qty?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="top-cart-action">
                                            <span class="top-checkout-price font-weight-semibold text-dark">Rp
                                                <?= number_format($total_cart); ?></span>
                                            <a href="cart.php"><button class="button button-dark button-small m-0">View
                                                    Cart</button></a>
                                        </div>
                                        <?php } else { ?>
                                        <div class="top-cart-items">
                                            <div class="top-cart-item">
                                                <div class="top-cart-item-desc">
                                                    <div class="top-cart-item-desc-title text-center">
                                                        Tidak ada produk
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="top-cart-action">
                                        <a href="product.php"
                                            class="text-center button button-3d button-small m-0 col-12">Add Product</a>
                                    </div>
                                    <?php } ?>
    
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

<div class="modal" tabindex="-1" role="dialog" id="modalbahasa" style="float:right; background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0);"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <label for="">Currency</label><br>
        <select name="currency" id="currency" class="custom-select">
            <option value="IDR">IDR</option>
            <option value="EURO">EURO</option>
            <option value="USD">USD</option>
        </select>
        <br>
        <label for="">Language</label><br>
        <select name="bahasa" id="bahasa" class="custom-select" ">
            <option value="Indonesia">Indonesia</otion>
            <option value="English">English</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="change_bahasa()">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>