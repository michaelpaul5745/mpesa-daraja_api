<?php
$consumerkey ="7GAMt7qdJfqxtFAtDLsAuT6DfyhIjjpkdClhFte6tGdJcDbb";
$consumersecrect="NNGDKnzsd4ffACf4dQe3tmOEEgAfgRl9GNV0KALC9jN9hj2UfWvJk73mIG8HUBEs";

$access_Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$headers =['Content-Type:application/json; charset=utf8'];

$curl = curl_init($access_Token_URL);
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerkey . ':' . $consumersecrect);

$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($result);

echo $acccess_token = $result->access_token;
curl_close($curl);

?>