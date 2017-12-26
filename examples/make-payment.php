<?php

use iroegbu\WebPay\Client;
use iroegbu\WebPay\Credentials;
use function iroegbu\WebPay\generatePaymentHash;
use function iroegbu\WebPay\getURLs;

require_once __DIR__ . '/../vendor/autoload.php';

$hashKey = 'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F';
$credentials = new Credentials($hashKey);


$transactionRef =                               //transactionRef
$productId = 6205;                              //demo product id
$paymentItemId = 101;                           //demo payment item id
$amount = 55000;                                //amount
$redirectUrl = 'http://abc.com/getresponse';    //demo redirect url
$urls = getURLs('development');
$hash = generatePaymentHash($transactionRef, $productId, $paymentItemId, $amount, $redirectUrl, $hashKey);
?>

<form name="form1" action="<?=$urls['payment']?>" method="post">
    <input name="product_id" type="hidden" value="<?=$productId?>"/>
    <input name="pay_item_id" type="hidden" value="<?=$paymentItemId?>"/>
    <input name="amount" type="hidden" value="<?=$amount?>"/>
    <input name="currency" type="hidden" value="566"/>
    <input name="site_redirect_url" type="hidden" value="<?=$redirectUrl?>"/>
    <input name="txn_ref" type="hidden" value="<?=$transactionRef?>"/>
    <input name="hash" type="hidden" value="<?=$hash?>"/>
    <button type="submit">PAY</button>
</form>