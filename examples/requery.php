<?php

use iroegbu\WebPay\Client;
use iroegbu\WebPay\Credentials;
use function iroegbu\WebPay\generateRequeryHash;

require_once __DIR__ . '/../vendor/autoload.php';

$hashKey = 'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F';

//Create an instance of Credentials and use that to create and instance of Client
$credentials = new Credentials($hashKey);
$client = new Client($credentials);

//Supply all other information (all these below are demo details)
$transactionRef = '0891281279172990';
$productId = 6205;
$amount = 55000;

//Generate Hash for requery
$hash = generateRequeryHash($productId, $transactionRef, $hashKey);

//Send request for transaction details
$response = $client->requery($transactionRef, $productId, $amount);
//You might be interested in just the contents of the body
echo $response->getBody()->getContents();
