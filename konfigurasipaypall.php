<?php

use GuzzleHttp\Client;

class paypal {

   private static $host         = 'https://api-m.sandbox.paypal.com/v1/';
   private static $clientId     = 'AbZYYESGbm5Qa7vbbkv66OJvIfx7_CSPcnlFC6QOevZ78s8I6lZQT1tKEDdRrGnidVAVIvNkaCu6Ucpk';
   private static $clientSecret = 'EBYV196iAwU1LknaPHOLodcyXqKZ_oQBxEpOj7ygluBbY3FJh_nIQGKOu_xBooyE0w8lEckbHss2o_LC';
 

   public function __construct()
   {
      $this->client = new Client(['base_uri' => self::$host]);
      date_default_timezone_set('Asia/Jakarta');
   }

   private function oauthToken()
   {
      $response = $this->client->post('oauth/token', [
         'verify'      => false,
         'form_params' => ['grant_type' => 'client_credentials'],
         'headers'     => [
            'Content-Type'  => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . self::$clientId . ':' . self::$clientSecret
         ]
      ]);

      return json_decode($response->getBody(true));
   }

//    private function login()
//    {
//       $access_token = $this->oauthToken()->access_token;
//       $response     = $this->client->post('users/login', [
//          'verify'  => false,
//          'json'    => ['email' => self::$email, 'password' => md5(self::$password)],
//          'headers' => [
//             'Authorization' => 'Bearer ' . $access_token,
//             'Content-Type'  => 'application/json'
//          ]
//       ]);

//       $result = json_decode($response->getBody(true));
//       return (object)[
//          'access_token'    => $access_token,
//          'crewdible_token' => $result->data->token
//       ];
//    }

   public function request($endpoint, $method = 'POST', $payload = []) 
   {
      
         $response = $this->client->request($method, $endpoint, [
            'verify'  => false,
            'json'    => $payload,
            'headers' => [
               'Authorization' => 'Bearer ' . $auth->access_token,
               'X-CREW-TOKEN'  => $auth->crewdible_token,
               'Content-Type'  => 'application/json'
            ]
         ]);

         return json_decode($response->getBody(true));
      
   }

   public function courier()
   {
    //   $data     = $this->request('logistics/lists/outbound/empty', 'POST', ['gudang' => self::$warehouse]);
    //   $response = [];

    //   foreach($data->data as $d) {
    //       if($d->name == 'JNT REG') {
    //          $response[] = [
    //             'name'     => 'jnt',
    //             'service'  => 'EZ',
    //             'id'       => $d->id
    //          ];
    //      }else if($d->name == 'SiCepat REG') {
    //            $response[] = [
    //               'name'      => 'sicepat',
    //               'service'   => 'REG',
    //               'id'        => $d->id
    //            ];
         
    //      }else if($d->name == 'Wahana Normal') {
    //         $response[] = [
    //            'name'      => 'wahana',
    //            'service'   => 'Normal',
    //            'id'        => $d->id
    //         ];
    //      }else if($d->name == 'AnterAja NextDay') {
    //         $response[] = [
    //            'name'      => 'anteraja',
    //            'service'   => 'ND',
    //            'id'        => $d->id
    //         ];
    //      }else if($d->name == 'Ninja Express') {
    //         $response[] = [
    //            'name'      => 'ninja',
    //            'service'   => 'STANDARD',
    //            'id'        => $d->id
    //         ];
    //      }
         // if($d->company == 'NINJA') {
         //    $response[] = [
         //       'name' => 'ninja',
         //       'id'   => $d->id
         //    ];
         // } else if($d->company == 'First Logistic') {
         //    $response[] = [
         //       'name' => 'first',
         //       'id'   => $d->id
         //    ];
           
         // } else if($d->company == 'JET Express') {
         //    $response[] = [
         //       'name' => 'jet',
         //       'id'   => $d->id
         //    ];
           
      //   if($d->company == 'JNE') {
      //       $response[] = [
      //          'name' => 'jne',
      //          'id'   => $d->id
      //       ];
         //  if($d->company == 'JNT') {
         //    $response[] = [
         //       'name' => 'jnt',
         //       'id'   => $d->id
         //    ];
         // } else if($d->company == 'Lion Parcel') {
         //    $response[] = [
         //       'name' => 'lion',
         //       'id'   => $d->id
         //    ];
         // } else if($d->company == 'AnterAja') {
         //    $response[] = [
         //       'name' => 'anteraja',
         //       'id'   => $d->id
         //    ];
         // } else if($d->company == 'REX') {
         //    $response[] = [
         //       'name' => 'rex',
         //       'id'   => $d->id
         //    ];
         // } else if($d->company == 'SiCepat') {
         //    $response[] = [
         //       'name' => 'sicepat',
         //       'id'   => $d->id
         //    ];
         // } else if($d->company == 'TIKI') {
         //    $response[] = [
         //       'name' => 'tiki',
         //       'id'   => $d->id
         //    ];
         // } else if($d->company == 'Wahana') {
         //    $response[] = [
         //       'name' => 'wahana',
         //       'id'   => $d->id
         //    ];
         // }
      }

      return $response;
   }
  

}