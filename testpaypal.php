<?php
include "vendor/autoload.php";

include "paypal/Payment.php";
use Payment\Payment;
$payment = new Payment;
?>  

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Pay with PayPal</title>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
               <div class="card" style="margin:200px auto 0; max-width:200px">
                   <div class="card-header">
                       <h3>Pay With Paypal</h3>
                   </div>
                   <div class="card-body">
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

<script src="https://www.paypal.com/sdk/js?client-id=AcVT31ZTNff1-yf9v50zD1PvewGkhpwrI5vm_n4yAr528swMHWE7iShPcy4Tsb6u--7wNcD9iFHU1XLy&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'horizontal',
          label: 'pay',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
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