<?php 
session_start();
require 'header.php';



if(!isset($_SESSION['id'])) {
	echo '<script>document.location.href="login.php"</script>';
}
$transaction         = mysqli_query($conn, "SELECT * FROM transaction WHERE customer_id = '$customer_id' ");
$transaction_unpaid  = mysqli_query($conn, "SELECT * FROM transaction WHERE customer_id = '$customer_id' and payment_status = 'paid' ");
$transaction_paid    = mysqli_query($conn, "SELECT * FROM transaction WHERE customer_id = '$customer_id' and payment_status = 'unpaid' ");
$transaction_sent    = mysqli_query($conn, "SELECT * FROM transaction WHERE customer_id = '$customer_id' and delivery_status = 'pending' ");

$transaction_done    = mysqli_query($conn, "SELECT * FROM transaction WHERE customer_id = '$customer_id' and delivery_status = 'done' ");

?>
	 <!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('<?=$base_url?>assets/store/images/frontend/pexels-leticia-ribeiro-2463605.jpg'); background-size: cover; padding: 170px 0 100px;" data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

			<div class="container clearfix">
				<h1>Order</h1>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
                <div class="container-fluid topmargin">
					<div class="row">
						<div class="col-md-2 sticky-sidebar-wrap">
							<ul class="list-unstyled items-nav sticky-sidebar shop-filter" data-container="#shop">
                                <li><a href="#" class="text-dark font-weight-semibold" data-filter="*" onclick="show('all')">All</a></li>
								<li><a href="#" class="text-dark font-weight-semibold" data-filter=".unpaid" onclick="show('unpaid')">Unpaid</a></li>
								<li><a href="#" class="text-dark font-weight-semibold" data-filter=".paid" onclick="show('paid')">Paid</a></li>
							</ul>
                        </div>
                        <div class="col-md-8">
							<div id="shop" class="row shop grid-container" data-layout="fitRows">
                                <?php if(mysqli_num_rows($transaction) > 0) { 
                                        while($row = mysqli_fetch_assoc($transaction)) { 
                                        $transaksi_id   = $row['id'];
                                        $payment_status = $row['payment_status'];
                                ?>
                                <div class="card <?=$payment_status?>" style="width: 100%" >
                                    <div class="card-header">
                                        <span class="mb-2"><?=$row['date']?></span>
                                        <span class="float-right badge badge-danger mb-2"><?php echo ($row['payment_status']=="unpaid") ?  "Unpaid": "Paid"; ?></span> 
                                        <span class="float-right"> &nbsp;</span>
                                        <span class="float-right badge badge-danger mb-2"><?php echo ($row['delivery_status']=="pending") ?  "Pending": "Sent";?></span>
                                    </div>
                                    <div class="card-body">
                                    <table class="table table-hover table-responsive w-100">
                                        <tbody>
                                        <?php $detail_transaction = mysqli_query($conn, "SELECT * FROM `transaction_detail` join product on product.id = transaction_detail.product_id WHERE transaction_detail.transaction_id= $transaksi_id");
                                            while($row2 = mysqli_fetch_assoc($detail_transaction)) { 
                                            $foto = explode(',',$row2['image']);
                                                ?>
                                            <tr>
                                                <td class="align-middle" width="10%">
                                                <img src="<?=$base_url?>assets/store/images/foto_produk/<?=$foto[0]?>" style="max-width:100px;" class="img-thumbnail img-fluid">
                                                </td>
                                                <td class="align-middle">
                                                <h5 class="text-danger mb-0">
                                                    <a href=""><?=$row2['name']?></a>
                                                </h5><p class="text-muted mb-0" style="font-size:14px;">X<?=$row2['qty']?></p>
                                                </td>
                                                <td class="text-center align-middle text-danger">
                                                Rp <?=number_format($row2['price'], 0, ',', '.')?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-right">
                                                <td colspan="3" class="align-middle">
                                                Total Pesanan: &nbsp;&nbsp;&nbsp;
                                                <span class="text-danger" style="font-size:30px;">Rp <?=number_format($row['subtotal'], 0, ',', '.')?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="align-middle text-muted"><?= date('d F Y',strtotime($row['date']));?></td>
                                                <td class="align-middle text-right">
                                                <?php if($payment_status == 'unpaid'){ ?>
                                                    <a href="#" class="button button-md">Pay</a>
                                                <?php }?>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                </div>
                                <?php }
                                
                                    } else {?>
                                  <div class="card empty" style="width: 100%">
                                        <div class="card-body">
                                        <div class="text-center">Tidak ada transaksi</div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <div>
                <div>
            </div>
        </section>
<?php require 'footer.php'; ?>
<script>
    function show(div_class){
       // alert(div_class);
        if(div_class == 'all'){
            $(".unpaid").show();
            $(".paid").show();
        }if(div_class == 'unpaid'){
            $(".unpaid").show();
            $(".paid").hide();
        }if(div_class == 'paid'){
            $(".unpaid").hide();
            $(".paid").show();
            
        }
    }
</script>