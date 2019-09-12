<?php

/* Using this example code, you can read the callback from litepay.ch servers 
 * with this you can confirm & update your db for the specific order id.
 * 
 * 
 */

//functions for converting and formatting amounts
function convertToBTCFromSatoshi($value) {
    $BTC = $value / 100000000;
    return $BTC;
}
        
function convertToSatoshiFromBTC($value) {
    $BTC = $value * 100000000;
    return $BTC;
}
        
function formatBTC($value) {
    $value = sprintf('%.8f', $value);
    $value = rtrim($value, '0');
    return $value;
}


$_secret = 'my_secret_passphrase';
$invoice_id = (string)$_GET['invoice'];
$confirmations = (int)$_GET['confirmations']; 
$input_address = (string)$_GET['input_address']; // litepay address
$destination_address = (string)$_GET['destination_address']; // your address
$value = formatBTC(convertToBTCFromSatoshi($_GET['value'])); // value in satoshi ()
$transaction_hash = (string)$_GET['transaction_hash']; // transaction_id
$coin = (string)$_GET['coin']; // coin paid.

if ($confirmations >= 0 && $_secret == $_GET['secret']) {
        //leave 0 as the system already accepted the payment in your behalf (and we're not going to double-spend)
	//sql update with the needed informations
	echo "*ok*";

}

?>