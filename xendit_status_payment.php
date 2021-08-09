<?php 

require 'header.php'; 

$id          = $_GET['id'];
$status      = $_GET['status'];
$query       = mysqli_query($conn, "SELECT * FROM transaction WHERE id = '$id'");
$transaction = mysqli_fetch_assoc($query);

if(!isset($_SESSION['id']) || mysqli_num_rows($query) < 1 || $status !== $transaction['delivery_status']) {
   echo '<script>document.location.href="/"</script>';
}

?>
<section id="content">
   <div class="content-wrap">
      <div class="container">
         <div class="text-center">
            <?php if($status == 'processed') { ?>
               <i style="font-size:80px;" class="icon-check-circle text-success"></i>
               <h3 class="text-uppercase font-weight-bold mb-1">Payment Successful</h3>
               <span>Thank you for making the payment.</span><br>
               <span>Your order will be processed immediately</span><br>
            <?php } else { ?>
               <i style="font-size:80px;" class="icon-check-circle text-success"></i>
               <h3 class="text-uppercase font-weight-bold mb-1">Payment Failed</h3>
               <span>Your payment failed.</span>
               <a href="/" class="btn btn-danger btn-sm mt-3">Back</a>
            <?php } ?>
         </div>
      </div>
   </div>
</section>
<?php require 'footer.php'; ?>