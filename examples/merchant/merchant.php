<?php

/* 
 * Example on how you can generate a invoice on your merchant account
 * on Litepay.ch
 */


include('litepay_ch.php');
$litepay = new litepay('merchant'); //using Merchant API 
$invoice_id = 22;

//always have a valid domain in callback/return
$callback_url = 'https://domain.com/callback_url.php?invoice='.$invoice_id;
$return_url = 'https://domain.com/success.php';

$parameters = array(
    'vendor' => 'your_vendor_id',
    'invoice' => $invoice_id,
    'secret' => 'your_secret_passphrase',
    'price' => '2',
    'callbackUrl' => urlencode($callback_url),
    'returnUrl' => urlencode($return_url)
  );


$data = $litepay->merchant($parameters);
if ($data->status == 'success') {
 header("Location: $data->url");   
} else {
 print $data->message;
}

?>