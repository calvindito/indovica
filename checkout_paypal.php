<?php
include 'connection.php';
include "paypal/Payment.php";
use Payment\Payment;
$payment = new Payment;
if(isset($_GET['kode'])){
    $kode = $_GET['kode'];
    $array = mysqli_fetch_assoc(mysqli_query($conn,"SELECT total,currency from transaction where id = $kode"));
    $total = $array['total'];
    $currency = $array['currency'];
    if($currency == 'EURO'){
      $currency = 'EUR';
    }
}else{
    $total = 0;
}
?>  

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Pay with PayPal</title>
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
   <div class="container">
               <!-- <form class="form-horizontal" method="POST" action="https://www.sandbox.PayPal.com/cgi-bin/webscr">
                   <fieldset>
                       <legend>Pay with PayPal</legend>
                       <div class="form-group">
                           <label class="col-md-4 control-label" for="amount">Payment Amount</label>
                           <div class="col-md-4">
                               <input id="amount" name="amount" type="text" placeholder="amount to pay" class="form-control input-md" required="">
                               <span class="help-block">help</span>
                           </div>
                       </div>
                       <input type='hidden' name='business' value='sb-i7jak6252765@business.example.com'>
                       <input type='hidden' name='item_name' value='Camera123'>
                       <input type='hidden' name='item_number' value='CAM#N1'>
                       <input type='hidden' name='no_shipping' value='1'>
                       <input type='hidden' name='currency_code' value='USD'>
                        <input type='hidden' name='notify_url' value='<?php echo $payment->route("notify", "") ?>'>
                        <input type='hidden' name='cancel_return' value='<?php echo $payment->route("http://phpstack-275615-1077014.cloudwaysapps.com/cancel.php", "") ?>'>
                       <input type='hidden' name='return' value='indovica.id/testpaypal.php'> 
                       <input type="hidden" name="cmd" value="_xclick">
                       <div class="form-group">
                           <label class="col-md-4 control-label" for="submit"></label>
                           <div class="col-md-4">
                               <button id="submit" name="pay_now" class="btn btn-danger">Pay With PayPal</button>
                           </div>
                       </div>
                   </fieldset>
               </form> -->

               <!-- example buttom -->
               <div class="card text-white bg-primary mb-3" style="margin:150px auto 0; max-width:300px">
                   <div class="card-header">
                       <h3>Pay With Paypal</h3>
                   </div>
                   <div class="card-body">
                       <div>
                       <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><?=$currency?></span>
                            </div>
                            
                            <input type="text" class="form-control" readonly value="<?=$total?>" id="amount">
                        </div>
                      
                       </div>
                       <br>
                        <div id="smart-button-container">
                            <div style="text-align: center;">
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                   </div>
               </div>
   </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
<script src="https://www.paypal.com/sdk/js?client-id=AcVT31ZTNff1-yf9v50zD1PvewGkhpwrI5vm_n4yAr528swMHWE7iShPcy4Tsb6u--7wNcD9iFHU1XLy&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>

    function initPayPalButton() {
        var currency = <?=json_encode($currency)?>;
        var total = <?=json_encode($total)?>;
        
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'horizontal',
          label: 'pay',
          tagline: 'false'
          
        },
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":currency,"value":total}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>