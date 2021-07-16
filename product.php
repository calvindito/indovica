<?php
session_start();
include 'header.php';
$product 		= mysqli_query($conn,"SELECT * FROM product where status = 'accepted'");
$category 		= mysqli_query($conn,"SELECT * FROM category");

$currency = 'IDR';
$search ='';

if(isset($_GET['search'])){
	$search = $_GET['search'];
	$product = mysqli_query($conn,"SELECT * FROM product where name like '%$search%' where status = 'accepted'");
}

if(isset($_POST['submit_check'])){
    
	$where = 'where 1 ';
	if($_POST['filter_check'] != ''){
	$filter 	= $_POST['filter_check'];
	$filter 	= substr($filter,0,-1);
	$filter_category = explode(',', $filter);
	$where 		.= "AND category_id in ($filter)";
	}
	$sort ='';
    $where .= "AND status = 'accepted'";
	if($_POST['sort_check'] == 'name'){
		$where .= ' order by name asc';
		$sort = 'name';
	}else if($_POST['sort_check'] == 'low'){
		$where .= ' order by public_price asc';
		$sort = 'low';
	}else if($_POST['sort_check'] == 'height'){
		$where .= ' order by public_price desc';
		$sort = 'height';
	}
	$sql = "SELECT * FROM product $where";
	$product 	= mysqli_query($conn,$sql);
  
    if($_POST['currency_check'] != ''){
        $currency = $_POST['currency_check'];
    }else{
        $currency = 'IDR';
    }
   
}
?>

<style>
/* Style the element that is used to open and close the accordion class */
p.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 7px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
    margin-bottom:10px;
}

/* Add a background color to the accordion if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
p.accordion.active, p.accordion:hover {
    background-color: #ddd;
}

/* Unicode character for "plus" sign (+) */
p.accordion:after {
    content: '\2795'; 
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}

/* Unicode character for "minus" sign (-) */
p.accordion.active:after {
    content: "\2796"; 
}

/* Style the element that is used for the panel class */

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.4s ease-in-out;
    opacity: 0;
    margin-bottom:10px;
}
div.panel2 {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.4s ease-in-out;
    opacity: 0;
    margin-bottom:10px;
}

div.panel.show {
    opacity: 1;
    max-height: 500px; /* Whatever you like, as long as its more than the height of the content (on all screen sizes) */
}
div.panel2.show {
    opacity: 1;
    max-height: 500px; /* Whatever you like, as long as its more than the height of the content (on all screen sizes) */
}
</style>
    <!-- Page Title
		============================================= -->


		<!-- Content
		============================================= -->
		<section id="content">
		   
			<div class="content-wrap pb-0">
			    <div class="container">
			    <h2 class="h1 font-weight-bold center">Our Products</h2>
				<div class="container-fluid topmargin">
					<div class="row">
						<div class="col-md-3 sticky-sidebar-wrap">
							<ul class="list-unstyled items-nav sticky-sidebar shop-filter" data-container="#shop">
                            	<div class="input-group mb-3">
									<form action="" method="get">
										<div class="row">
											<div class="col-9">
											<input type="text" class="form-control" placeholder="Search" name="search" value="<?=$search?>">
											</div>
											<div class="col-3">
											<button class="button button-dark button-sm " type="submit" style="height:80%; margin-left:-20px;margin-top:0"><i class="icon-line-search"></i></button>
										
											</div>
										</div>
									
										
											
									</form>
                                </div>
                                
         <!--                       	<p class="accordion filter-currency active">Currency</p>-->
									<!--<div class="panel show">-->
									    
									<!--	<input type="checkbox" id="idr" name="idr" value="IDR" onchange="getcurrency('IDR')">-->
									<!--	<label > &nbsp; IDR </label><br>-->
									<!--	<input type="checkbox" id="euro" name="euro" value="EURO" onchange="getcurrency('EURO')">-->
									<!--	<label > &nbsp; Euro </label><br>-->
									<!--	<input type="checkbox" id="height" name="usd" value="USD" onchange="getcurrency('USD')">-->
									<!--	<label > &nbsp; USD </label><br>-->
									<!--</div>-->
					
									<p class="accordion filter-category active">Category</p>
									<div class="panel show">
										<?php while($data = mysqli_fetch_assoc($category)){
											$category_id = $data['id'];
											$category_name = $data['name'];
											if(isset($filter_category)){
												
													if(in_array($category_id,$filter_category)){
											?>
														<input type="checkbox" checked class="check_category" id="<?=$category_id?>" name="category[]" value="<?=$category_id?>" onchange="getcheck()">
														<label for="<?=$category_name?>" class="check_label">  <?=$category_name?></label><br>
														
												<?php  }else{ ?>
														<input type="checkbox" class="check_category" id="<?=$category_id?>" name="category[]" value="<?=$category_id?>" onchange="getcheck()">
														<label for="<?=$category_name?>" class="check_label">  <?=$category_name?></label><br>
											<?php 		}
													
												} else {?>
												<input type="checkbox"class="check_category" id="<?=$category_id?>" name="category[]" value="<?=$category_id?>" onchange="getcheck()">
												<label for="<?=$category_name?>" class="check_label" style="font-size:11px">  <?=$category_name?></label><br>
										<?php }}?>
									

									</div>

									<!--<p class="accordion filter-price active">Sort By</p>-->
									<!--<div class="panel show">-->
									    
									<!--	<input type="checkbox" class="check_sort" id="name" name="sort" value="name" onchange="getsort('name')">-->
									<!--	<label > &nbsp; Name </label><br>-->
									<!--	<input type="checkbox" id="low" class="check_sort" name="sort" value="low" onchange="getsort('low')">-->
									<!--	<label > &nbsp; Price : Low to High</label><br>-->
									<!--	<input type="checkbox" id="height" class="check_sort" name="sort" value="height" onchange="getsort('height')">-->
									<!--	<label > &nbsp; Price : High to Low</label><br>-->
									<!--</div>-->
									<div class="panel show">
									    <a href="product.php"><button class="btn btn-primary" style="width: 100%">Reset</button></a>
									    
									</div>

							<hr>

							<div>
								<!-- <h5 class="ls0 text-muted">Select Price:</h5>
								<input class="range_23" /> -->
							</div>

						</div>

						<div class="col-md-9">
						    <div class="row shop grid-container" data-layout="fitRows" style="margin-left:10px">
						        <div class="col-md-6 d-none d-xl-block">
						            <div class="row">
    						            <div class="form-group row no-gutters">
    						                <label class="col-5 col-form-label">Currency</label>
    						          
    						            </div>
    						            <div class="col-7">
    						                <Select class="custom-select" name="currency" onchange="getcurrency(this.value)">
    						                    <option value="IDR">IDR</option>
    						                    <option value="USD">USD</option>
    						                    <option value="EURO">EURO</option>
    						                    
    						                </Select>
    						                
    						            </div>
						            </div>
						        </div>
						         <div class="col-md-6 d-none d-xl-block">
						            <div class="row">
    						            <div class="form-group row no-gutters">
    						                <label class="col-5 col-form-label">Sort</label>
    						          
    						            </div>
    						            <div class="col-7">
    						                <Select class="custom-select" name="sort" onchange="getsort(this.value)">
    						                    <option value="name">Name</option>
    						                    <option value="low">Low to High</option>
    						                    <option value="height">High to Low</option>
    						                    
    						                </Select>
    						                
    						            </div>
						            </div>
						        </div>
						        
						    </div>
						    <hr><br>
							<div id="shop" class="row shop grid-container" data-layout="fitRows">

								<!-- Shop Item 1
								============================================= -->
                                <?php if(mysqli_num_rows($product)>0) {
								while($row = mysqli_fetch_assoc($product)){
								    
										$product_id 	= $row['id'];
										$product_name 	= $row['name'];
										$product_image 	= explode(',',$row['image']);
										$product_price 	= $row['public_price'];
										$currency_price = $row['currency'];
								
									   if($currency != 'IDR' && $currency_price != 'IDR' ){
									  
									        $currency_sql 	= mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency_price'"));
									        $nominal        = $currency_sql['nominal'];
									        $idr            = $product_price * $nominal ;
									        
									        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency'"));
									        $nominal2        = $currency2_sql['nominal'];
									        $harga          = $idr / $nominal2;
									        $simbol         = $currency2_sql['simbol'];
									   }else if($currency == 'IDR' && $currency_price != 'IDR'){
									        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency_price'"));
									        $nominal2        = $currency2_sql['nominal'];
									        $harga          = $product_price * $nominal2;
									        $simbol         = 'Rp';
									       
									   }else if($currency != 'IDR' && $currency_price == 'IDR'){
									        $currency2_sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM currency where name='$currency'"));
									        $nominal2        = $currency2_sql['nominal'];
									        $harga          = $product_price / $nominal2;
									        $simbol         = $currency2_sql['simbol'];
									       
									   }
									       else{
									       $simbol = 'Rp';
									       $harga = $product_price;
									   }
									     
										
								?>
								<div class="oc-item col-lg-4 col-md-6 mb-4">
							<div class="product">
								<div class="product-image">
									<?php for($i=0;$i<count($product_image);$i++){?>
									<a href="#"><img src="<?=$base_url?>global_assets/images/foto_produk/<?=$product_image[$i]?>" height="200px" alt="Round Neck T-shirts"></a>
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
									<div class="product-price font-primary"><ins><?=$simbol?> <?=number_format($harga)?></ins></div>
								</div>
							</div>
						</div>
								<?php } } else {?>
                                  <div class="card empty" style="width: 100%">
                                        <div class="card-body">
                                        <div class="text-center">Product not found</div>
                                        </div>
                                    </div>
                                <?php } ?>
								

							</div>
						</div>
					</div>
				</div>

				
</div>
			</div>
		</section><!-- #content end -->
		<form action="product.php" method="POST">
			<input type="text" name="filter_check" id="filter_check" value="" hidden>
			<input type="text" name="sort_check" id="sort_check" value="" hidden>
			<input type="text" name="currency_check" id="currency_check" value="" hidden>
			
			<button type="submit" id="submit_check" name="submit_check" hidden></button>
		</form>


        <?php
include 'footer.php';
?>
<?php
    if(isset($_POST['sort_check'])){
	if($_POST['sort_check'] == 'name'){

		echo "<script>$('#name').attr('checked','checked');</script>";
	}else if($_POST['sort_check'] == 'low'){

		echo "<script>$('#low').attr('checked','checked');</script>";
	}else if($_POST['sort_check'] == 'height'){

		echo "<script>$('#height').attr('checked','checked');</script>";
	}
    }
?>
<script>
$('#low').attr('checked');
document.addEventListener("DOMContentLoaded", function(event) { 
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
};
}

function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
    }
}


});

function getcheck(){
	var checkbox = document.getElementsByClassName("check_category");
	var sort = document.getElementsByClassName("sort_category");
	var label = document.getElementsByClassName("check_label");
    var ary ='';
	var sortt;
    for (var i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked) {
            ary += checkbox[i].value;
            ary += ",";
        }

    }
	for (var i = 0; i < sort.length; i++) {
        if (sort[i].checked) {
            sortt = sort[i].value;
            
        }

    }
	
	
	$('#filter_check').val(ary);
	$('#sort_check').val(sortt);
	document.getElementById("submit_check").click();
}

function getsort(sort){
	var checkbox = document.getElementsByClassName("check_category");
    var ary ='';
    for (var i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked) {
            ary += checkbox[i].value;
            ary += ",";
        }

    }
	
	$('#filter_check').val(ary);
	$('#sort_check').val(sort);
	document.getElementById("submit_check").click();
}

function getcurrency(sort){
    var checkbox = document.getElementsByClassName("check_category");
    var ary ='';
    for (var i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked) {
            ary += checkbox[i].value;
            ary += ",";
        }

    }
	
	$('#filter_check').val(ary);
	$('#currency_check').val(sort);
	document.getElementById("submit_check").click();
}
</script>