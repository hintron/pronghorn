<?php
// Require the Composer autoload, so we can use modules without requiring them explicitly
require "../vendor/autoload.php";

// Not needed with autoloader...
// require_once('../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

error_log("Getting tweets...");

// Twitter API oauth wrapper
// Use it to create the proper oauth signature, but then siphon url and signature through Guzzle

// This file will contain these vars:
    // $customer_key
    // $customer_secret
    // $access_token
    // $access_token_secret
require "../php/secret.php";
// NOTE: This file is NOT saved in Git, since this code is public

// Build the oauth signature using TwitterAPIExchange
// See https://github.com/J7mbo/twitter-api-php

$settings = array(
    'oauth_access_token' => $access_token,
    'oauth_access_token_secret' => $access_token_secret,
    'consumer_key' => $customer_key,
    'consumer_secret' => $customer_secret
);

$twitter_request_url = 'https://api.twitter.com/1.1/search/tweets.json';
$twitter_request_get_fields = '?q=%40lingotek&result_type=recent';
$twitter_request_method = 'GET';
$twitter = new TwitterAPIExchange($settings);

// Create the oauth signature
// This basically does oauth stuff for me, so I don't have to
// it creates a signature according to this document: https://dev.twitter.com/oauth/overview/creating-signatures
$twitter->setGetfield($twitter_request_get_fields);
$twitter->buildOauth($twitter_request_url, $twitter_request_method);
$json = $twitter->performRequest();

// echo $json;
// Pass true to turn objects into assc. arrays, for easy iteration
$response = json_decode($json, true);
// error_log(print_r($response,1));

echo "<p>HTTP Method: $twitter_request_method</p>";
echo "<p>URL: $twitter_request_url$twitter_request_get_fields</p>";
echo "<p>HTTP Response Code: " . $twitter->lastResponseCode  . "</p>";
// NOTE: I added a public lastResponseCode field to the twitter api code and then used
// curl_getinfo($feed, CURLINFO_RESPONSE_CODE); inside the performRequest() function to get the status
// TODO: To make this permanent, I will need to fork the twitter api code

// Display some simple data
if(array_key_exists('statuses', $response)){

    echo "<h2>" . sizeof($response['statuses']) . " Statuses:</h2>";

    foreach ($response['statuses'] as $value) {
        echo "<h3>" /*. $value['created_at'] . ": "*/ . $value['user']['name'] . " said, \"" . $value['text'] . "\"</h3>";
    }
}
else {
    error_log("Could not find twitter statuses!");
}


// No Longer Used:


// use GuzzleHttp\Client;
// $client = new Client([
//     // Base URI is used with relative requests
//     'base_uri' => 'https://api.twitter.com/1.1',
// ]);

// $client->setDefaultOption('verify', false);
// $response = $client->request('GET', '/', ['verify' => true]);
// $response = $client->request('GET', 'http://gmc.lingotek.com/language');
// $response = $client->request('GET', 'https://api.twitter.com/oauth2/token');
// $response = $client->request('GET', 'https://api.twitter.com/oauth/request_token');

// if(isset($response) && $response != null){
//     error_log("parsing response...");

//     $code = $response->getStatusCode(); // 200
//     $reason = $response->getReasonPhrase(); // OK

//     echo "<h2>$code $reason</h2>";

//     $body = $response->getBody();

//     echo $body;

// }


?>