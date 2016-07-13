<?php
// Require the Composer autoload, so we can use Guzzle
require "../vendor/autoload.php";

error_log("Getting tweets...");

// Start using Guzzle to pull down tweets from Twitter
use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://api.twitter.com/1.1',
]);


// $client->setDefaultOption('verify', false);
// $response = $client->request('GET', '/', ['verify' => true]);

// var_dump(openssl_get_cert_locations());


// $response = $client->request('GET', 'http://gmc.lingotek.com/language');
// $response = $client->request('GET', '');
$response = $client->request('GET', 'https://api.twitter.com/oauth2/token');
$response = $client->request('GET', 'https://api.twitter.com/oauth/request_token');

// To get an Oauth 2 Bearer Token
// https://api.twitter.com/oauth2/token

if(isset($response) && $response != null){
    error_log("parsing response...");

    $code = $response->getStatusCode(); // 200
    $reason = $response->getReasonPhrase(); // OK

    echo "<h2>$code $reason</h2>";

    $body = $response->getBody();

    echo $body;

}

// error_log(print_r($body,1));



// echo $body;


// error_log(var_dump($response,1));
// var_dump($response,1);


?>