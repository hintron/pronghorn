<?php
// Require the Composer autoload, so we can use Guzzle
require "../vendor/autoload.php";

error_log("Getting tweets...");

// Start using Guzzle to pull down tweets from Twitter
use GuzzleHttp\Client;

$client = new Client([
    // Base URI is used with relative requests
    // 'base_uri' => 'http://gmc.lingotek.com/language',
]);


// $response = $client->request('GET');
$response = $client->request('GET', 'http://gmc.lingotek.com/language');

$code = $response->getStatusCode(); // 200
$reason = $response->getReasonPhrase(); // OK

echo "<h2>$code $reason</h2>";

$body = $response->getBody();

echo $body;

// error_log(print_r($body,1));



// echo $body;


// error_log(var_dump($response,1));
// var_dump($response,1);


?>