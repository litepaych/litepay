Litepay.ch class for our Merchant & Payment API
---------------

This is [Litepay.ch php class for our Merchant & Payment API](https://litepay.ch/#api). This extenstion allows to easily accept bitcoins (and other cryptocurrencies such as Litecoin, Cash & more) at your website. 

To successfully use this class, you need to import it in your project & call it. If you want to use our Merchant API, you will need to [Register for Merchant](https://litepay.ch/merchant/register) and create a VENDOR ID.

*** EXPLANATION ***

Our api requires some info from you, to be able to generate a address for your payment;

$method -> Use 'btc' / 'ltc' / 'zec' / 'bch' / 'bsv' as a value for parameter method, based on entered value a Bitcoin, Litecoin, Zcash, Bitcoin Cash, Bitcoin SV address will be generated<br />

$address -> Your Receiving Bitcoin/Litecoin/Zcash/BCASH/BitcoinSV Address (Where you would like the payment to be sent)<br />

$callback_url - The callback URL to be notified when a payment is received. Remember to URL Encode the callback URL when calling the create method. The domain must be valid, or else your request will be denied.<br />

$callback_req - It allows you to choose if you want to get a callback from our system. 0 for no, 1 for yes (Default is 1) (If you choose to not receive a callback, set it to 0 and do not send a url.)<br />

**EXAMPLE** 

Payment API:
```shell
include('litepay_ch.php'); //in your file
$litepay = new litepay('api'); //using payment API 
$_secret = 'my_secret_passphrase';
$invoice_id = '123_order_number'; 
$callback_url =  'https://your_domain.com/callbacks/litepay/callback.php?id='.$invoice_id.'&secret='.$_secret; 

$method = 'btc';
$return_address = '1BDesouFJaHyr7DejtGrq7K14D5gSbS4DT';

$parameters = array(
    'address'=>$return_address,
    'method'=>$method,
    'callback'=> urlencode($callback_url)
  );

$new_address = $litepay->receive($parameters);
if($new_address->status == "success") { 
    $address = $new_address->address;
}
```

Merchant API:
1. Go to https://litepay.ch/merchant/register and register for a merchant
2. Go to vendor id & create a vendor & passphrase, you will receive them on your email

```shell
include('litepay_ch.php');
$litepay = new litepay('merchant'); //using Merchant API 


$invoice_id = 22;

//always have a valid domain in callback/return
$callback_url = 'https://domain.com/callback_url.php?invoice='.$invoice_id;
$return_url = 'https://domain.com/success.php';

$parameters = array(
    'vendor' => 'VENDOR_ID',
    'invoice' => $invoice_id,
    'secret' => 'PASSPHRASE',
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
```

===================================================

**INFORMATION**

These plugins have been developed by litepay.ch<br/>
More info on our API here: [https://litepay.ch/#api](https://litepay.ch/#api) <br />
If you need any further support regarding our services you can contact us via:<br />
E-mail: [info@litepay.ch](mailto:info@litepay.ch)<br />
Web: [https://litepay.ch](https://litepay.ch)<br />
Twitter: [@litepaych](https://twitter.com/litepay_ch)<br />