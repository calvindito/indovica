<?php
    namespace Payment;
    use Omnipay\Omnipay;
    class Payment
    {
       /**
        * @return mixed
        */
       public function gateway()
       {
           $gateway = Omnipay::create('PayPal_Express');
           $gateway->setUsername("sb-i7jak6252765@business.example.com");
           $gateway->setPassword("9Z9ADWRX9F52FCYK");
           $gateway->setSignature("ADT2nP.zOpA-lKvHkzG4tYEodltNA.pzP0L-bDoaDgTlvWjkfPCPzs-D");
           $gateway->setTestMode(true);
           return $gateway;
       }
       /**
        * @param array $parameters
        * @return mixed
        */
       public function purchase(array $parameters)
       {
           $response = $this->gateway()
               ->purchase($parameters)
               ->send();
           return $response;
       }
       /**
        * @param array $parameters
        */
       public function complete(array $parameters)
       {
           $response = $this->gateway()
               ->completePurchase($parameters)
               ->send();
           echo "<script type='text/javascript'>alert('sukses');</script>";
        // header("location: urlbaru.php");

           return $response;

       }
     
       /**
        * @param $amount
        */
       public function formatAmount($amount)
       {
           return number_format($amount, 2, '.', '');
       }
       /**
        * @param $order
        */
       public function getCancelUrl($order = "")
       {
           return $this->route('http://phpstack-275615-1077014.cloudwaysapps.com/cancel.php', $order);
       }
       /**
        * @param $order
        */
       public function getReturnUrl($order = "")
       {
       
           return $this->route('http://phpstack-275615-1077014.cloudwaysapps.com/return.php', $order);
       }
       public function route($name, $params)
       {
           return $name; // ya change hua hai
       }
    }