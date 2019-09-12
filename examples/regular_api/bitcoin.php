<?php

/* litepay.ch accepting bitcoin/litecoin/zcash & more crypto example.
 * make sure you protect your $_POST and $_GET requests if you send them to db.
 */
include('litepay_ch.php'); //

//$_POST data
$price = $_POST['price'];
$invoice_id = (string)$_POST['invoice'];
if (!is_numeric($price)) {exit();}


$litepay = new litepay('api'); //using payment API 
$_secret = 'my_secret_passphrase';
$callback_url =  'https://domain.com/callback.php?id='.$invoice_id.'&secret='.$_secret; //type in your domain name

$method = 'btc'; // Use 'btc' / 'ltc' / 'zec' / 'bch' / 'bsv' as a value for parameter method
$return_address = '1BDesouFJaHyr7DejtGrq7K14D5gSbS4DT'; // your return address for the payment, switch the address if you are using another method

$parameters = array(
    'address'=>$return_address,
    'method'=>$method,
    'callback'=> urlencode($callback_url),
    'callback_req'=>1 //if you do not want to use this (callback) write 0
  );

$new_address = $litepay->receive($parameters);
if($new_address->status == "success") { 
    $address = $new_address->input_address;
}


/*
 * you can use the data above to save it in db & check it later
 * save: $price, $invoice_id, $method, $return_address & $address
 */


?>