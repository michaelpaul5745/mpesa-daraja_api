<?php

include 'accessToken.php';
date_default_timezone_set('Africa/Nairobi');

$processrequest = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://pawikconstructioncompany.co.ke/darajaapi/callback.php';
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
$password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$phone = '254708028080';
$money = '1';
$PartyA = $phone;
$PartB = '254715527590';
$AccountReference = 'Michael';
$TransactionDesc = 'stkpush test';
$Amount = $money;
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' .  $access_token ];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequest);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);

$curl_post_data = array(

   
   'BusinessShortCode' => $BusinessShortCode,  
   'Password' =>$password,    
   'Timestamp' =>$Timestamp,    
   'TransactionType' => 'CustomerPayBillOnline',    
   'Amount' =>$Amount,   
   'PartyA' =>$PartyA,    
   'PartyB'=>$BusinessShortCode,    
   'PhoneNumber' =>$PartyA,    
   'CallBackURL' =>$callbackurl,    
   'AccountReference' =>$AccountReference,    
   'TransactionDesc' =>$TransactionDesc,
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);

//echo the response
echo $curl_response;



?>